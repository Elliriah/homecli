import React from 'react';
import logo from './logo.svg';
import './App.css';
import 'bootstrap/dist/css/bootstrap.min.css';
import { Redirect } from 'react-router-dom'


class App extends React.Component {
  
  ProtectedComponent() {
       return <Redirect to='/light'  />
   }

  render() {
    return (
      <>
      {this.ProtectedComponent()}
      </>
    )
  }
}

export default App