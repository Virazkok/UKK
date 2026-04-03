import { useEffect, useState } from "react";
import api from "../../api/axios";
import { Kategori } from "../../types";

export default function Form() {
    const [kategori, setKategori] = useState<Kategori[]>([]);
    const [form, setForm] = useState({
        judul: "",
        deskripsi: "",
        id_kategori: ""
    });

    useEffect(() => {
        api.get<Kategori[]>("/kategori").then(res => setKategori(res.data));
    }, []);

    const submit = async () => {
        await api.post("/pengaduan", {
            ...form,
            tanggal_pengaduan: new Date().toISOString().slice(0,10)
        });

        alert("Berhasil");
    };

    return (
        <div>
            <input onChange={e => setForm({...form, judul:e.target.value})} />
            <textarea onChange={e => setForm({...form, deskripsi:e.target.value})} />

            <select onChange={e => setForm({...form, id_kategori:e.target.value})}>
                {kategori.map(k => (
                    <option key={k.id_kategori} value={k.id_kategori}>
                        {k.nama_kategori}
                    </option>
                ))}
            </select>

            <button onClick={submit}>Kirim</button>
        </div>
    );
}