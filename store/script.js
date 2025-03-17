// استيراد وظائف فايربيس
import { initializeApp } from "https://www.gstatic.com/firebasejs/9.6.1/firebase-app.js";
import { getAuth, onAuthStateChanged, signInWithEmailAndPassword, createUserWithEmailAndPassword, signOut } from "https://www.gstatic.com/firebasejs/9.6.1/firebase-auth.js";

// تكوين Firebase
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

// التحقق مما إذا كان المستخدم مسجلاً بالفعل وتوجيهه إلى الحساب
onAuthStateChanged(auth, (user) => {
  if (user) {
    window.location.href = "dashboard.html"; // استبدل بصفحة الحساب الفعلية
  }
});

// تسجيل مستخدم جديد
document.getElementById("register-btn").addEventListener("click", (e) => {
  e.preventDefault();
  const email = document.getElementById("register-email").value;
  const password = document.getElementById("register-password").value;

  createUserWithEmailAndPassword(auth, email, password)
    .then((userCredential) => {
      alert("تم إنشاء الحساب بنجاح!");
      window.location.href = "dashboard.html"; // توجيه المستخدم إلى حسابه
    })
    .catch((error) => {
      alert("خطأ: " + error.message);
    });
});

// تسجيل الدخول
document.getElementById("login-btn").addEventListener("click", (e) => {
  e.preventDefault();
  const email = document.getElementById("login-email").value;
  const password = document.getElementById("login-password").value;

  signInWithEmailAndPassword(auth, email, password)
    .then((userCredential) => {
      alert("تم تسجيل الدخول بنجاح!");
      window.location.href = "dashboard.html"; // توجيه المستخدم بعد تسجيل الدخول
    })
    .catch((error) => {
      alert("خطأ: " + error.message);
    });
});

// تسجيل الخروج
document.getElementById("logout-btn").addEventListener("click", (e) => {
  e.preventDefault();
  signOut(auth)
    .then(() => {
      alert("تم تسجيل الخروج بنجاح!");
      window.location.href = "account.html"; // إعادة التوجيه إلى صفحة تسجيل الدخول
    })
    .catch((error) => {
      alert("خطأ: " + error.message);
    });
});
