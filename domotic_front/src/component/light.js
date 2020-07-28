import React from 'react'
import axios from 'axios';
import {Container, Row} from 'react-bootstrap';
import LightDisplayer from './displayer/lightdisplayer'
class Light extends React.Component {
  constructor(props) {
    super(props);
    this.state = { light: null, error: "ui"}
  }
  componentWillMount() {
    axios.get(`http://localhost:8000/light/show`)
      .then(res => {
        this.setState({'light' : res.data});
      })
  }
  
  displaylight() {
    var ret = []
    if (this.state.light != null) {
        this.state.light.map((value, index) => {
        ret.push(<LightDisplayer key={index} light={value} index={index} />);
      })
      return ret
    }
    return ret
  }

    render() {
      return (
        <>
        
        <Container style={{marginTop: '15px'}}>
            <Row className="justify-content-md-center">
              {this.displaylight()}
          
            </Row>
          </Container>
        </>
      )
    }
  }
  
  export default Light