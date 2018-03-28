import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import Home from  "./components/Home";
import Apartments from "./components/Apartments";
import Tasks from "./components/Tasks";
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

require('./components/Home');
require('./components/Apartments');
require('./components/Tasks');



ReactDOM.render(
    <HashRouter>
        <div>
        <Route exact="/home" component={Home}>
            <Route path="apartments" component={Apartments}>Apartments</Route>
            <Route path="tasks" component={Tasks}>Tasks</Route>
        </Route>
        </div>
    </HashRouter>
        ,document.getElementById('app'));
