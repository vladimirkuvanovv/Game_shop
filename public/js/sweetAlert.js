// import React from 'react';
// import swal from '@sweetalert/with-react';
// import swal from 'sweetalert';
let React = require('react');
let ReactDOM = require('react-dom');

// const element = (
//     <div>
//     <h1>Hello!</h1>
// <h2>Good to see you here.</h2>
// </div>
// );



let signIn = document.getElementById('sign-in');
signIn.addEventListener('click', function () {
    swal({
        title: "Войти",
        content: {
            label:'Name',
            element: "input",
            attributes: {
                placeholder: "Ваше email",
                type: "email",
            },
        },
        button: {
            text: "Отправить",
            closeModal: false,
        },
    });


    // class App extends React.Component {
    //     componentDidMount() {
    //         swal(
    //         <div>
    //         <h1>Hello!</h1>
    //         <p>I am a React component inside a SweetAlert modal.</p>
    //         </div>
    //     )
    //     }
    // }
    // })
});
