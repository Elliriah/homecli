
import {Card, Col} from 'react-bootstrap';
import React from 'react'
import 'react-rangeslider/lib/index.css'
import axios from 'axios';
//import '../css/shutter.css'

class ShutterDisplayer extends React.Component {
    constructor(props, context) {
        super(props, context)
        this.state = {
          state_shutter: this.props.shutter.state,
          state_bulb: this.props.shutter.state
        }
      }
     

    modifyShutter(value) {
        axios.post('http://127.0.0.1:8000/shutter/update/' + value.id, {
            shutter: {
                id: value.id,
                name: value.name,
                state: this.state.state_shutter
            }
          })
          .then(function (response) {
            console.log(response)
          })
          .catch(function (error) {
            console.log(error);
          });
    }

    handleOnChange = (value) => {
        this.setState({
            intensity: value
        })
        this.modifyShutter(this.props.shutter);
    }

    handleClickPlus = () => {
      this.setState({
        state_shutter: true
      })
        this.modifyShutter(this.props.shutter)
    }
    handleClickMinus = () => {
      this.setState({
        state_shutter: false
      })
      this.modifyShutter(this.props.shutter)
  }

    render() {
        if (this.state.state_shutter === true) {
        var shutter_img = '/roller.png'
        } else {
            var shutter_img = '/roller_off.png'
        }
      return ( <>
                <Col sm={4}>
                    
                   <Card style={{background: 'rgba(219, 219, 219, 0.8)'}}>
                    <Card.Body className="mx-auto" >
                      <Card.Title className="mx-auto text-center">{this.props.shutter.name}</Card.Title>
                      <Card.Text >
                       
                        <a onClick={this.handleClickMinus}>
                        <img style={{width: '3em'}}
                            src='/down.png'
                            />
                        </a>

                        <img
                            src={shutter_img}
                            />
                        <a onClick={this.handleClickPlus}>
                        <img style={{width: '3em'}}
                            src='/up.png'
                            />
                        </a>
                      </Card.Text >
                    </Card.Body >
                  </Card>
                </Col>


              </>
      )
    }
  }
  
  export default ShutterDisplayer