import { useState } from "react";
import "./App.css";
import LeftBar from "./componetes/LeftBar";

function App() {
    const [page, setPage] = useState("");

    return (
        <div className="app-div">
            <LeftBar userType={"admin"} setPage={setPage} />
            <div className="page-container">
                <h1>{page}</h1>
                <div>
                    {page === "Instructors" && "Hello from this component"}
                    {page === "Courses" && "Hello from courses component"}
                    {page === "Students" && "Hello from studentß component"}
                    {page === "Instructors" && "Hello from this component"}
                </div>
            </div>
        </div>
    );
}

export default App;
