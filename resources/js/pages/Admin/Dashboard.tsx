import { useEffect, useState } from "react";
import api from "../../api/axios";
import { Pengaduan } from "../../types";

export default function AdminDashboard() {
    const [data, setData] = useState<Pengaduan[]>([]);

    useEffect(() => {
        api.get<Pengaduan[]>("/pengaduan").then(res => setData(res.data));
    }, []);

    const updateStatus = async (id: number, status: string) => {
        await api.put(`/pengaduan/${id}/status`, { status });
        location.reload();
    };

    return (
        <div>
            {data.map(p => (
                <div key={p.id_pengaduan}>
                    <p>{p.judul}</p>

                    <button onClick={() => updateStatus(p.id_pengaduan, "diproses")}>
                        Proses
                    </button>

                    <button onClick={() => updateStatus(p.id_pengaduan, "selesai")}>
                        Selesai
                    </button>
                </div>
            ))}
        </div>
    );
}