import React from "react";
import Button from "./Button";

const LeftBar = ({ userType, setPage }) => {
    return (
        <div className="left_bar">
            <img
                className="logo"
                src="../../assites/images/logo.png"
                alt="logo"
            />
            <div className="btn-container">
                {userTitles[userType].map((title) => {
                    return (
                        <Button text={title} onclick={() => setPage(title)} />
                    );
                })}
            </div>
        </div>
    );
};
const userTitles = {
    admin: ["Students", "Instructors", "Courses"],
    student: ["Courses", "Assingments", "Announcements"],
    instructor: ["Students", "Assingments", "Courses", "Announcements"],
};
export default LeftBar;
