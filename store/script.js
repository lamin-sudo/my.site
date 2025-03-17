// ====== تهيئة Firebase ======
import { initializeApp } from "https://www.gstatic.com/firebasejs/10.8.1/firebase-app.js";
import { getAuth, createUserWithEmailAndPassword, signInWithEmailAndPassword, signOut, onAuthStateChanged } from "https://www.gstatic.com/firebasejs/10.8.1/firebase-auth.js";

const firebaseConfig = {
  apiKey: "AIzaSyBhOJQjj7kDhe2f7P3q8fJ0zoTXJmRH960",
  authDomain: "mystore-9e92b.firebaseapp.com",
  projectId: "mystore-9e92b",
  storageBucket: "mystore-9e92b.appspot.com",
  messagingSenderId: "620837836452",
  appId: "1:620837836452:web:bd1b2e179acbd5d1733831"
};

// تهيئة التطبيق والمصادقة
const app = initializeApp(firebaseConfig);
const auth = getAuth();

// ====== التحقق من حالة تسجيل الدخول ======
onAuthStateChanged(auth, (user) => {
  if (user) {
    console.log("المستخدم مسجل دخول:", user.email);
    if (window.location.pathname.includes("login.html") || window.location.pathname.includes("register.html")) {
      window.location.href = "account.html"; // إعادة التوجيه إلى الحساب
    }
  } else {
    console.log("المستخدم غير مسجل دخول");
    if (window.location.pathname.includes("account.html")) {
      window.location.href = "login.html"; // إعادة التوجيه إلى تسجيل الدخول
    }
  }
});

// ====== تسجيل الدخول ======
document.getElementById("loginForm")?.addEventListener("submit", function (e) {
  e.preventDefault();
  let email = document.getElementById("loginEmail").value;
  let password = document.getElementById("loginPassword").value;
  
  signInWithEmailAndPassword(auth, email, password)
    .then((userCredential) => {
      alert("تم تسجيل الدخول بنجاح!");
      window.location.href = "dashboard.html"; // توجيه المستخدم إلى صفحة الحساب
    })
    .catch((error) => {
      alert("خطأ في تسجيل الدخول: " + error.message);
    });
});

// ====== إنشاء حساب جديد ======
document.getElementById("registerForm")?.addEventListener("submit", function (e) {
  e.preventDefault();
  let email = document.getElementById("registerEmail").value;
  let password = document.getElementById("registerPassword").value;
  
  createUserWithEmailAndPassword(auth, email, password)
    .then((userCredential) => {
      alert("تم إنشاء الحساب بنجاح!");
    })
    .catch((error) => {
      alert("خطأ في إنشاء الحساب: " + error.message);
    });
});

// ====== تسجيل الخروج ======
document.getElementById("logout-btn")?.addEventListener("click", function () {
  signOut(auth)
    .then(() => {
      alert("تم تسجيل الخروج بنجاح!");
      window.location.href = "index.html"; // توجيه المستخدم إلى الصفحة الرئيسية
    })
    .catch((error) => {
      alert("خطأ في تسجيل الخروج: " + error.message);
    });
});

// ====== فتح/إغلاق القائمة الجانبية ======
document.getElementById("menu-toggle")?.addEventListener("click", function () {
  const sidebar = document.getElementById("sidebar");
  if (sidebar.style.left === "0px" || sidebar.style.left === "") {
    sidebar.style.left = "-250px"; // إخفاء القائمة
  } else {
    sidebar.style.left = "0px"; // إظهار القائمة
  }
});
