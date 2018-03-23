import React, { Component } from 'react';


export default class StatusButton extends Component{
    constructor(){
        super();
        this.state = {
            status: 'cross'
        };
    }

    render(){
        return (
            <div className={'statusbutton ' + this.state.status} onClick={this.flip.bind(this)}>
            </div>);
    }

    flip(){
        console.log('flip');
        if(this.state.status == 'cross') {
            this.setState({
                status :'check'
            });

        } else if(this.state.status == 'check') {
            this.setState({
              status: 'cross'
            });
        }
    }
}


