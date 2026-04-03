import { BrowserRouter, Routes, Route } from "react-router-dom";
import Login from "./pages/auth/login";
import Dashboard from "./pages/Siswa/Dashboard";
import Form from "./pages/Siswa/Form";
import Admin from "./pages/Admin/Dashboard";
import ProtectedRoute from "./components/ProtectedRoute";

export default function App() {
    return (
        <BrowserRouter>
            <Routes>
                <Route path="/" element={<Login />} />

                <Route path="/siswa" element={
                    <ProtectedRoute><Dashboard /></ProtectedRoute>
                }/>

                <Route path="/form" element={
                    <ProtectedRoute><Form /></ProtectedRoute>
                }/>

                <Route path="/admin" element={
                    <ProtectedRoute><Admin /></ProtectedRoute>
                }/>
            </Routes>
        </BrowserRouter>
    );
}