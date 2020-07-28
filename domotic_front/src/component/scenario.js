import React from 'react'
import axios from 'axios';
import {Card, Col, Container, Row, Button} from 'react-bootstrap';
import 'react-rangeslider/lib/index.css'
import Slider from 'react-rangeslider'
class Scenario extends React.Component {
  constructor(props) {
    super(props);
    this.state = { intensity: 0}
  }

  componentDidMount() {
    if (localStorage.getItem('intensity') != null) {
      this.setState({
        intensity: localStorage.getItem('intensity')
      })
    }
  }
  
  nightMode = () => {
    axios.post('http://127.0.0.1:8000/scenario/nightmode'
    )
    .then(function (response) {
      console.log(response);
    })
    .catch(function (error) {
      console.log(error);
    });
  }

  equalizeIntensity(value) {
    axios.post('http://127.0.0.1:8000/scenario/equalizeint/' + this.state.intensity
    )
    .then((response) => {
      console.log(response);
      localStorage.setItem('intensity', value);
    })  
    .catch(function (error) {
      console.log(error);
    });
    
  }

  coldMode = () => {
    axios.post('http://127.0.0.1:8000/scenario/coldmode'
    )
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
    
    this.equalizeIntensity(value)
  }


    render() {

      const formatPc = p => p + '%'
      return (
        <>
          <Container style={{marginTop: '15px'}}>
            <Row className="justify-content-md-center">
            <Col sm={4}>
              <Card style={{background: 'rgba(219, 219, 219, 0.8)'}}>
              <Card.Body className="mx-auto" >
                      <Card.Title >Mode Grand Froid</Card.Title>
                      <Card.Text className="mx-auto text-center">
                <Button variant="outline-primary"onClick={this.coldMode}>Activer</Button>
                  </Card.Text>
                </Card.Body>
              </Card>
            </Col>
            <Col sm={4}>
            <Card style={{background: 'rgba(219, 219, 219, 0.8)'}}>
              <Card.Body className="mx-auto" >
                      <Card.Title >Egalisation Intensité Lumière</Card.Title>
                      <div style={{width: '100%', margin: '0 auto;'}}>
                        <Slider
                            value={this.state.intensity}
                            orientation="horizontal"
                            onChange={ this.handleOnChange}
                            format={formatPc}
                        /></div>
                        <div style={{textAlign: 'center'}} className='value'>{formatPc(this.state.intensity)}</div>
            
              </Card.Body>
            </Card>
            </Col>
            <Col sm={4}>
            <Card style={{background: 'rgba(219, 219, 219, 0.8)'}}>
              <Card.Body className="mx-auto" >
                      <Card.Title >Mode Nuit</Card.Title>
                      <Card.Text className="mx-auto text-center">
                      <Button variant="outline-dark" onClick={this.nightMode}>Activer</Button>
                      </Card.Text>
            
              </Card.Body>
            </Card>
            </Col>
            </Row>
          </Container>
        </>
      )
    }
  }
  
  export default Scenario