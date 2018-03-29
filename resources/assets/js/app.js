import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import Main from "./components/Main";
import Apartments from "./components/Apartments/Apartments";
import Tasks from "./components/Tasks/Tasks";
import { Route, IndexRoute, HashRouter } from "react-router-dom";

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes React and other helpers. It's a great starting point while
 * building robust, powerful web applications using React + Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh React component instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

require('./components/Main');
require('./components/Apartments/Apartments');
require('./components/Tasks/Tasks');



ReactDOM.render(
    <HashRouter>
        <div>
        <Route string="/home" component={Main}>
            {/*<Route path="apartments" component={Apartments}>Apartments</Route>*/}
            {/*<Route path="tasks" component={Tasks}>Tasks</Route>*/}
        </Route>
        </div>
    </HashRouter>
        ,document.getElementById('app'));
