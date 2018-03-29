import React, { Component } from 'react';
import ReactDOM from 'react-dom';

class StatusButton extends Component{

    constructor(props) {
        super(props);

        this.state = {
            key: 0,
            task_key: props.task_key,
            value: 0
        }
    }

    render() {
        return (
            <div className="statu">
                {
                    this.props.logs
                        .filter(
                            log => log.task_key == this.props.task_key)
                        .map(
                            (log) => {
                                return (
                                    <div className="log">
                                        <Log
                                            description={log.description}
                                            hours={log.hours}
                                            task_key={log.task_key}
                                            user={log.user}
                                        />
                                    </div>
                                )
                            }

                        )
                }
            </div>
        )
    }
}

}
