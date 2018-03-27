import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import Apartments from "./components/Apartments";
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

require('./components/Apartments');


ReactDOM.render(
    <HashRouter>
        <div>
        <Route exact="/home" component={Apartments}>

        </Route>
        </div>
    </HashRouter>
        ,document.getElementById('app'));
