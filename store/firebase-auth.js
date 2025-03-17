// استيراد وظائف المصادقة من Firebase
import { getAuth, createUserWithEmailAndPassword, signInWithEmailAndPassword, signOut } from "firebase/auth";
import { initializeApp } from "firebase/app";

const firebaseConfig = {
  apiKey: "AIzaSyBhOJQjj7kDhe2f7P3q8fJ0zoTXJmRH960",
  authDomain: "mystore-9e92b.firebaseapp.com",
  projectId: "mystore-9e92b",
  storageBucket: "mystore-9e92b.appspot.com",
  messagingSenderId: "620837836452",
  appId: "1:620837836452:web:bd1b2e179acbd5d1733831"
};

// تهيئة Firebase
const app = initializeApp(firebaseConfig);
const auth = getAuth(app);

// تسجيل مستخدم جديد
function registerUser(email, password) {
  createUserWithEmailAndPassword(auth, email, password)
    .then((userCredential) => {
      console.log("تم إنشاء الحساب:", userCredential.user);
      alert("تم إنشاء الحساب بنجاح!");
    })
    .catch((error) => {
      console.error("خطأ في التسجيل:", error.message);
      alert(error.message);
    });
}

// تسجيل الدخول
function loginUser(email, password) {
  signInWithEmailAndPassword(auth, email, password)
    .then((userCredential) => {
      console.log("تم تسجيل الدخول:", userCredential.user);
      alert("تم تسجيل الدخول بنجاح!");
    })
    .catch((error) => {
      console.error("خطأ في تسجيل الدخول:", error.message);
      alert(error.message);
    });
}

// تسجيل الخروج
function logoutUser() {
  signOut(auth)
    .then(() => {
      console.log("تم تسجيل الخروج");
      alert("تم تسجيل الخروج بنجاح!");
    })
    .catch((error) => {
      console.error("خطأ في تسجيل الخروج:", error.message);
      alert(error.message);
    });
}

// تصدير الدوال لاستخدامها في ملفات أخرى
export { registerUser, loginUser, logoutUser };
