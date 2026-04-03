import { useState } from "react";
import api from "../../api/axios";
import { User } from "../../types";

export default function Login() {
    const [email, setEmail] = useState<string>("");
    const [password, setPassword] = useState<string>("");

    const submit = async (e: React.FormEvent) => {
        e.preventDefault();

        try {
            const res = await api.post<{
                token: string;
                user: User;
            }>("/login", { email, password });

            localStorage.setItem("token", res.data.token);
            localStorage.setItem("user", JSON.stringify(res.data.user));

            window.location.href =
                res.data.user.role === "admin" ? "/admin" : "/siswa";

        } catch {
            alert("Login gagal");
        }
    };

    return (
        <form onSubmit={submit}>
            <input onChange={e => setEmail(e.target.value)} />
            <input type="password" onChange={e => setPassword(e.target.value)} />
            <button>Login</button>
        </form>
    );
}