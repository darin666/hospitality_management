import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import Tasks from "./Tasks/Tasks";
import Apartments from "./Apartments/Apartments";

class Main extends Component {
    render(){
        return(
            <div>
                {/*<h3 className={'text-center'}>Apartments and Tasks</h3>*/}
                <div className={'row'}>
                    <div className={'col-md-4'}>
                        <Tasks/>
                    </div>
                    <div className={'col-md-8'}>
                        <Apartments/>
                    </div>
                </div>
            </div>
        );

    }
}

export default Main;

if (document.getElementById('app')) {
    ReactDOM.render(<Main />, document.getElementById('app'));
}