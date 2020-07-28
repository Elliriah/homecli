
import {Card, Button, Col} from 'react-bootstrap';
import React from 'react';
import 'react-rangeslider/lib/index.css'
import axios from 'axios';


class HeaterDisplayer extends React.Component {
    constructor(props, context) {
        super(props, context)
        this.state = {
          temperature: this.props.heater.temperature,
          state_bulb: this.props.heater.state,
          mode: this.props.heater.mode,
          number: 10
        }
      }
     

    modifyHeater(value) {
        axios.post('http://127.0.0.1:8000/heater/update/' + value.id, {
            heater: {
                id: value.id,
                name: value.name,
                temperature: this.state.temperature,
                mode: this.state.mode
            }
          })
          .then(function (response) {
            return
          })
          .catch(function (error) {
            console.log(error);
          });
    }

    handleOnChange = (value) => {
        this.setState({
            temperature: value
        })
        this.modifyHeater(this.props.heater);
    }

    handleClickPlus = () => {
      if (this.state.temperature + 1 > 30) {
        return
      }
        this.setState({
          temperature: this.state.temperature + 1
        })
        this.modifyHeater(this.props.heater)
    }
    handleClickMinus = () => {
      if (this.state.temperature - 1 < 16) {
        return
      }
      this.setState({
        temperature: this.state.temperature - 1
      })
      this.modifyHeater(this.props.heater)
  }
    handleClick(num_mode) {
      this.setState({
        mode: num_mode
      })
      this.modifyHeater(this.props.heater)
    }
    render() {
        const formatPc = p => p + '°C'

      return ( <>
                <Col sm={4}>
                   <Card style={{background: 'rgba(219, 219, 219, 0.8)'}}>
                    <Card.Body className="mx-auto" >
                      <Card.Title className="mx-auto text-center">{this.props.heater.name}</Card.Title>
                      <Card.Text className="mx-auto">
                      <a onClick={this.handleClickMinus}>
                        <img style={{width: '3em', marginBottom: '20px', marginRight: '20px'}}
                            src='/-.png'
                            />
                        </a>
                          <span style={{fontWeight: 'bold', fontSize: '40px', marginRight: '20px'}}>{formatPc(this.state.temperature)}</span>

                        <a onClick={this.handleClickPlus}>
                        <img style={{width: '3em', marginBottom: '20px'}}
                            src='/+.png'
                            />
                        </a>
                      </Card.Text >
                      <Card.Text className="mx-auto text-center">
                        <Button style={{marginRight: '10px'}} value="oui" variant="primary" onClick={() => this.handleClick(0)}>Hiver</Button>
                        <Button style={{marginRight: '10px'}} variant="danger" onClick={() => this.handleClick(1)}>Ete</Button>
                        <Button style={{marginRight: '10px'}} variant="dark" onClick={() => this.handleClick(3)}>Eteindre</Button>
                      </Card.Text>
                    </Card.Body >
                  </Card>
                </Col>


              </>
      )
    }
  }
  
  export default HeaterDisplayer