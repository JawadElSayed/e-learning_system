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
        </div>
    );
};

export default Head;
