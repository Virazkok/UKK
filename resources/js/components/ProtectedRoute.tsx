type Props = {
    children: React.ReactNode;
};

export default function ProtectedRoute({ children }: Props) {
    const token = localStorage.getItem("token");

    if (!token) {
        window.location.href = "/";
        return null;
    }

    return <>{children}</>;
}