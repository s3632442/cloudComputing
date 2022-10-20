import { BrowserRouter, NavLink, Route, Switch } from 'react-router-dom';
import Home from './Home';
import Register from './Register';
import Login from './Login';
import PremiumContent from './PremiumContent';
import PublicRoute from './routes/PublicRoute';
import PrivateRoute from './routes/PrivateRoute';
import { useEffect, useState } from 'react';
import {
  getUser,
  getToken,
  setUserSession,
  resetUserSession,
} from './service/AuthService';
import axios from 'axios';

const verifyTokenAPIURL =
  ' https://nrttr16068.execute-api.us-east-1.amazonaws.com/prod/verify';

function App() {
  const [isAuthenticating, setAuthenticating] = useState(true);

  useEffect(() => {
    const token = getToken();
    if (
      token === 'undefined' ||
      token === undefined ||
      token === null ||
      !token
    ) {
      return;
    }

    const requestConfig = {
      headers: {
        'x-api-key': 'yib7A74Vi12nhObY2dPkgWCbT56UQgz63QPbs7Vj',
      },
    };

    const requestBody = {
      user: getUser(),
      token: token,
    };

    axios
      .post(verifyTokenAPIURL, requestBody, requestConfig)
      .then((response) => {
        setUserSession(response.data.user, response.data.token);
        setAuthenticating(false);
      })
      .catch(() => {
        resetUserSession();
        setAuthenticating(false);
      });
  }, []);

  const token = getToken();
  if (isAuthenticating && token) {
    return <div className='content'>Authenticating...</div>;
  }

  return (
    <div className='App'>
      <BrowserRouter>
        <div className='header'>
          <NavLink exact activeClassName='active' to='/'>
            Home
          </NavLink>
          <NavLink exact activeClassName='active' to='/register'>
            Register
          </NavLink>
          <NavLink exact activeClassName='active' to='/login'>
            Login
          </NavLink>
          <NavLink exact activeClassName='active' to='/premium-content'>
            Premium Content
          </NavLink>
        </div>
        <div className='content'>
          <Switch>
            <Route exact path='/' component={Home} />
            <PublicRoute path='/register' component={Register} />
            <PublicRoute path='/login' component={Login} />
            <PrivateRoute path='/premium-content' component={PremiumContent} />
          </Switch>
        </div>
      </BrowserRouter>
    </div>
  );
}

export default App;
