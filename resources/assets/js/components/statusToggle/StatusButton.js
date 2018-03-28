import React, { Component } from 'react';


export default class StatusButton extends Component{
    constructor(props){
        super(props);
        this.state = {
            status: 'cross',
            value: 0
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
                status :'check',
                value: 1
            });

        } else if(this.state.status == 'check') {
            this.setState({
                status: 'cross',
                value: 0
            });
        }
    }
}


