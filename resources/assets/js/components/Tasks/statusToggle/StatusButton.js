import React, { Component } from 'react';


export default class StatusButton extends Component{
    constructor(props){
        super(props);
        this.state = {
            value: this.props.status,
            status: 'cross',
        };
            if (this.state.value === 1){
            this.state.status = 'check';
        } else {
            this.state.status = 'cross';
            }
    }

    render(){

        return (
            <div className={'statusbutton ' + this.state.status}
                 onClick={this.flip.bind(this)}>
            </div>);
    }

    flip(){
        console.log('flip');
        if(this.state.status == 'cross') {
            this.setState({
                status :'check',
                value: 1
            });
            this.props.handleClickButton(1);

        } else if(this.state.status == 'check') {
            this.setState({
                status: 'cross',
                value: 0
            });
            this.props.handleClickButton(0);
        }
    }
}


