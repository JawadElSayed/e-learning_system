import React from "react";

const Button = ({ text, onclick }) => {
    return <button onClick={onclick}>{text}</button>;
};

Button.defaultProps = {
    text: "default",
};

export default Button;
