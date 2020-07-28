import React from 'react';
import ReactDOM from 'react-dom';
import './index.css';
import Shutter from './component/shutter'
import Heater from './component/heater'
import Light from './component/light'
import Scenario from './component/scenario'
import NotFoundPage from './component/NotFoundPage'
import App from './App';
import { Switch, NavLink, Route, BrowserRouter as Router } from 'react-router-dom'
import * as serviceWorker from './serviceWorker';
import {Nav, Navbar} from 'react-bootstrap';
import { withRouter } from "react-router";

const Header = props => {
  const { location } = props;
  return (
    <>

<Navbar collapseOnSelect expand="lg" bg="dark" variant="dark">
  <Navbar.Brand href="#home">HomeCLI</Navbar.Brand>
  <Navbar.Toggle aria-controls="responsive-navbar-nav" />
  <Navbar.Collapse id="responsive-navbar-nav">
    <Nav activeKey={location.pathname} className="mx-auto">
      <Nav.Item>
            <Nav.Link as={NavLink} to="/light">Lumière</Nav.Link>
          </Nav.Item>
          <Nav.Item>
            <Nav.Link as={NavLink} to="/heater">Climatiseur</Nav.Link>
          </Nav.Item>
          <Nav.Item>
           <Nav.Link  as={NavLink} to="/shutter">Volets</Nav.Link>
          </Nav.Item>
          <Nav.Item>
           <Nav.Link  as={NavLink} to="/scenario">Scenario</Nav.Link>
          </Nav.Item>
    </Nav>
  </Navbar.Collapse>
</Navbar>
    </>
  );
};
const HeaderWithRouter = withRouter(Header);

const routing = (
    <>
  <Router>
  <HeaderWithRouter />
  <Switch>
      <Route exact path="/" component={App} />
      <Route exact path="/light" component={Light} />
      <Route exact path="/heater" component={Heater} />
      <Route exact path="/shutter" component={Shutter} />
      <Route exact path="/scenario" component={Scenario} />

      <Route component={NotFoundPage} />
      </Switch>
    </Router>
  </>

  )
  
  ReactDOM.render(routing, document.getElementById('root'))

// If you want your app to work offline and load faster, you can change
// unregister() to register() below. Note this comes with some pitfalls.
// Learn more about service workers: https://bit.ly/CRA-PWA
serviceWorker.unregister();
