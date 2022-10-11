const Head = ({ pageTitle }) => {
    return (
        <div>
            {pageTitle === "Students" && (
                <div className="titles">
                    <h3 className="title">ID</h3>
                    <h3 className="title">Name</h3>
                </div>
            )}

            {pageTitle === "Instructors" && (
                <div className="titles">
                    <h3 className="title">ID</h3>
                    <h3 className="title">Name</h3>
                </div>
            )}
            {pageTitle === "Courses" && (
                <div className="titles">
                    <h3 className="title">Code</h3>
                    <h3 className="title">Name</h3>
                    <h3 className="title">Assiged</h3>
                    <h3 className="title">credit</h3>
                </div>
            )}
            {pageTitle === "Assingments" && (
                <div className="titles">
                    <h3 className="title">Course</h3>
                    <h3 className="title">Title</h3>
                    <h3 className="title">Assingment</h3>
                    <h3 className="title">Due TO</h3>
                </div>
            )}
            {pageTitle === "Announcements" && (
                <div className="titles">
                    <h3 className="title">Title</h3>
                    <h3 className="title">Announcement</h3>
                    <h3 className="title">Date</h3>
                </div>
            )}
        </div>
    );
};

export default Head;
