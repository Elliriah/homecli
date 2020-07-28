import React from 'react'
import axios from 'axios';
import { Link } from 'react-router-dom'

class NotFoundPage extends React.Component {
  constructor(props) {
    super(props);
  }
    render() {
      return (
        <>
            <div><p style={{textAlign:"center"}}>
                404: Page not Found
            </p>
            <p style={{textAlign:"center"}}>
              <Link to="/">Go to Home </Link>
            </p>
          </div>;
        </>
      )
    }
  }
  
  export default NotFoundPage