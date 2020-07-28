import React from 'react'
import axios from 'axios';
import {Container, Row} from 'react-bootstrap';
import ShutterDisplayer from './displayer/shutterdisplayer'

class Shutter extends React.Component {
  constructor(props) {
    super(props);
    this.state = { shutter: null, error: "ui"}
  }
  componentWillMount() {
    axios.get(`http://localhost:8000/shutter/show`)
      .then(res => {
        this.setState({'shutter' : res.data});
      })
  }
  
  displayshutter() {
    var ret = []
    if (this.state.shutter != null) {
        this.state.shutter.map((value, index) => {
        ret.push(<ShutterDisplayer key={index} shutter={value} index={index} />);
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
              {this.displayshutter()}
          
            </Row>
          </Container>
        </>
      )
    }
  }
  
  export default Shutter