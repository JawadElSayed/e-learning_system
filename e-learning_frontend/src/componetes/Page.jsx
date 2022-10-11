import React from "react";
import Head from "./Head";

const Page = ({ pageTitle, data }) => {
    return (
        <>
            <Head pageTitle={pageTitle} />
            {/* <div>
                {data.map((d) => {
                    return (
                        <>
                            <p className="row">{d.user_id}</p>
                            <p className="row">{d.name}</p>
                        </>
                    );
                })}
            </div> */}
        </>
    );
};

export default Page;
