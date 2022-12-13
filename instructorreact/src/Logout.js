import axiosConfig from "./axiosConfig";
const Logout = () =>
{
    const logout = (e) =>
    {
        e.preventDefault();
        axiosConfig.post("/instructor/logout").then
        ((rsp) => {
            localStorage.removeItem('_instructorAuthToken');
            window.location.href = "/";
        } , (err) => {
            console.log(err);
        })
    }

    return(
        <div>
            <button className="btn btn-success" onClick={logout}>Logout</button>
        </div>
    );
}

export default Logout;