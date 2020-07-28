import React from 'react'
import axios from 'axios';
import {Container, Row} from 'react-bootstrap';
import HeaterDisplayer from './displayer/heaterdisplayer'

class Heater extends React.Component {
  constructor(props) {
    super(props);
    this.state = { heater: null}
  }

  componentWillMount() {
    axios.get(`http://localhost:8000/heater/show`)
      .then(res => {
        this.setState({'heater' : res.data});
      })
  }

  displayheater() {
    var ret = []
    if (this.state.heater != null) {
        this.state.heater.map((value, index) => {
        ret.push(<HeaterDisplayer key={index} heater={value} index={index} />);
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
              {this.displayheater()}
              
          
            </Row>
          </Container>
        </>
      )
    }
  }
  
  export default Heater