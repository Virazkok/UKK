export type * from './auth';
export type * from './navigation';
export type * from './ui';

export interface User {
    id_user: number;
    nama: string;
    email: string;
    role: "admin" | "siswa";
    kelas?: string;
}

export interface Kategori {
    id_kategori: number;
    nama_kategori: string;
}

export interface Pengaduan {
    id_pengaduan: number;
    id_user: number;
    id_kategori: number;
    judul: string;
    deskripsi: string;
    status: "menunggu" | "diproses" | "selesai";
    tanggal_pengaduan: string;
}