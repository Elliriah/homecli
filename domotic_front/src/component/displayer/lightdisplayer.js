
import {Card, Col, Carousel} from 'react-bootstrap';
import React from 'react';
import Slider from 'react-rangeslider'
import 'react-rangeslider/lib/index.css'
import axios from 'axios';

class LightDisplayer extends React.Component {
    constructor(props, context) {
        super(props, context)
        this.state = {
          intensity: this.props.light.intensity,
          state_bulb: this.props.light.state
        }
      }
     

    modifyLight(value) {

        axios.post('http://127.0.0.1:8000/light/update/' + value.id, {
            light: {
                id: value.id,
                name: value.name,
                intensity: this.state.intensity,
                state: this.state.state_bulb
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
            intensity: value
        })
        this.modifyLight(this.props.light);
    }

    handleClick = () => {

        if (this.state.state_bulb === true) {
            this.setState({
                state_bulb: false
            })
        } else {
            this.setState({
                state_bulb: true
            })
        }
        this.modifyLight(this.props.light)
    }

    render() {
        const formatPc = p => p + '%'
        if (this.state.state_bulb === true) {
        var bulb_img = '/light_bulb_on.png'
        } else {
            var bulb_img = '/light_bulb_off.png'
        }
      return ( <>
                <Col sm={4}>
                    
                   <Card style={{background: 'rgba(219, 219, 219, 0.8)'}}>
                    <Card.Body className="mx-auto" >
                      <Card.Title >{this.props.light.name}</Card.Title>
                      <Card.Text className="mx-auto">


                        <a onClick={this.handleClick}>
                            <img style={{width: '10em'}}
                            src={bulb_img}
                            />
                        </a>
                        <div style={{width: '100%', margin: '0 auto;'}}>
                        <Slider
                            value={this.state.intensity}
                            orientation="horizontal"
                            onChange={ this.handleOnChange}
                            format={formatPc}
                        /></div>
                        <div style={{textAlign: 'center'}} className='value'>{formatPc(this.state.intensity)}</div>
                      </Card.Text >
                    </Card.Body >
                  </Card>
                </Col>


              </>
      )
    }
  }
  
  export default LightDisplayer