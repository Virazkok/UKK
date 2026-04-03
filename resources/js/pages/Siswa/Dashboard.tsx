import { useEffect, useState } from "react";
import api from "../../api/axios";
import { Pengaduan, User } from "../../types";

export default function Dashboard() {
    const [data, setData] = useState<Pengaduan[]>([]);

    useEffect(() => {
        const fetch = async () => {
            const res = await api.get<Pengaduan[]>("/pengaduan");

            const user: User = JSON.parse(localStorage.getItem("user")!);

            const filtered = res.data.filter(p => p.id_user === user.id_user);
            setData(filtered);
        };

        fetch();
    }, []);

    return (
        <div>
            {data.map(p => (
                <div key={p.id_pengaduan}>
                    <p>{p.judul}</p>
                    <p>{p.status}</p>
                </div>
            ))}
        </div>
    );
}