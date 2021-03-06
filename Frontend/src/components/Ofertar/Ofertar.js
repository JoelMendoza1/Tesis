import React, {useState, useEffect}from "react";
import {Card, message, Select, Checkbox} from 'antd';
import {API} from "../../services/API";
import { Form, Input, Button,TimePicker, InputNumber} from 'antd';
import {HistoryOutlined } from '@ant-design/icons';
import axios from "axios";
import {Option} from "antd/es/mentions";

export default function Ofertar() {
    const [idEmpresa, setIdEmpresa] = useState({})
    const getUser= async ()=>{
        let url = API + 'usuarios';
        const token =localStorage.getItem('token')
        const t= token.replace(/['"]+/g, '')
        const config = {
            headers: { Authorization: `Bearer ${t}` }
        };
        axios.get(url, config).then(
            response=>{
                console.log('Usuario')
                getEmpresa(response.data.id)
            }
        )
    }
    const getEmpresa= async (id)=>{
        console.log(id)
        let url = API + 'users/'+id+'/empresas';
        const token =localStorage.getItem('token')
        const t= token.replace(/['"]+/g, '')
        const config = {
            headers: { Authorization: `Bearer ${t}` }
        };
        axios.get(url, config).then(
            response=>{
                console.log(response.data.id)
                setIdEmpresa({
                    idEmpresa: response.data.id
                })
            }
        ).catch(
            e=>{
                console.log(e.message)
            }
        )
    }
    useEffect(() => {
        getUser()
    },[]);
    const onFinish = async (userData) => {
        const idempresa = idEmpresa.idEmpresa
        let urlAPI = API + 'empresas/'+idempresa+'/ofertas';
        const token = localStorage.getItem('token')
        const t = token.replace(/['"]+/g, '')
        const fecha = new Date();
        const config = {
            headers: {
                Authorization: `Bearer ${t}`,
                Accept: 'application/json'
            }
        };
        const data={
                oferta: userData.oferta,
                descripcionOferta: userData.descripcionOferta,
                horario: userData.horario[0].format('HH:mm')+" a "+userData.horario[1].format('HH:mm'),
                numberoPostulantes: userData.numberoPostulantes,
                direcionOferta: userData.direcionOferta,
                carreraOferta: userData.carreraOferta,
                visible: userData.visible,
                fechaOferta: fecha+""
            }
            axios.post(urlAPI,data,config).then(
                response => {
                    message.success('Oferta creada');
                    console.log(response.data)
                    console.log(response.data.request)
                    console.log(response.data.descriptionRequest)
                    window.location.reload();
                }
            ).catch(e => {
                console.log(e.response.data)
                message.error('Error ' + e.message);
            })
            console.log(data)
            console.log(idempresa)
    };
    return (
        <div>
                <Card
                    style={{
                        width: '700px',
                        alignContent: 'center',
                        margin: 'auto',
                    }}
                >
                    <Form
                        name="basic"
                        labelCol={{span: 7}}
                        wrapperCol={{span: 12}}
                        initialValues={{remember: true}}
                        onFinish={onFinish}
                        style={{
                            width: '700px'
                        }}
                    >
                        <h1 align='center' style={{padding:'40px'}}>Formulario de Orfertas</h1>
                        <Form.Item
                            label={<label> Oferta</label>}
                            name="oferta"
                            rules={[{
                                required: true,
                                whitespace:true,
                                message: 'Por favor ingresale un t??tulo a tu oferta!'
                            },{
                                pattern: /^[a-zA-Z??-??\u00f1\u00d1]+(\s*[a-zA-Z??-??\u00f1\u00d1]*)*[a-zA-Z??-??\u00f1\u00d1]+$/,
                                message: 'Ingresar solo letras!',
                                type:'string',
                            }]}
                        >
                            <Input/>
                        </Form.Item>
                        <Form.Item
                            label={<label> Descripci??n</label>}
                            name="descripcionOferta"
                            rules={[{required: true, whitespace:true, message: 'Por favor ingresa una descripci??n!'}]}
                        >
                            <Input.TextArea/>
                        </Form.Item>
                        <Form.Item
                            label={<label><HistoryOutlined /> Horario laboral</label>}
                            name="horario"
                        >
                            <TimePicker.RangePicker bordered={false} format='HH:mm' />
                        </Form.Item>
                        <Form.Item
                            label={<label> N??mero de postulantes</label>}
                            name="numberoPostulantes"
                            rules={[{required: true, message: 'Por favor ingresa el n??mero de postulantes que deseas!'}]}
                        >
                            <InputNumber min={1} max={100}/>
                        </Form.Item>
                        <Form.Item
                            label={<label> Direcci??n</label>}
                            name="direcionOferta"
                            rules={[{
                                required: true,
                                whitespace:true,
                                message: 'Por favor ingresa una direcci??n!'
                            }]}
                        >
                            <Input/>
                        </Form.Item>
                        <Form.Item
                            label={<label> Carrera</label>}
                            name="carreraOferta"
                            rules={[{required: true,whitespace:true, message: 'Por favor ingresa una carrera!'}]}
                        >
                            <Select>
                                <Option value="Tecnolog??a Superior en Agua y Saneamiento Ambiental - TSASA">
                                    Tecnolog??a Superior en Agua y Saneamiento Ambiental - TSASA
                                </Option>
                                <Option value="Tecnolog??a Superior en Electromec??nica -TSEM">
                                    Tecnolog??a Superior en Electromec??nica -TSEM
                                </Option>
                                <Option value="Tecnolog??a Superior en Redes y Telecomunicaciones - TSRT">
                                    Tecnolog??a Superior en Redes y Telecomunicaciones - TSRT
                                </Option>
                                <Option value="Tecnolog??a Superior en Desarrollo de Software -TSDS">
                                    Tecnolog??a Superior en Desarrollo de Software -TSDS
                                </Option>
                            </Select>
                        </Form.Item>
                        <Form.Item
                            label={<label> Publicar</label>}
                            name="visible"
                            valuePropName="checked"
                        >
                            <Checkbox />
                        </Form.Item>
                        <Form.Item wrapperCol={{offset: 8, span: 16}}>
                            <Button type="primary" htmlType="submit" style={{
                                backgroundColor: '#1E1E2F',
                                color: '#ffffff',
                                marginTop: '30px',
                                border: "#ffffff"
                            }}>
                                Publicar Oferta
                            </Button>
                        </Form.Item>


                    </Form>
                </Card>
        </div>
    )
}