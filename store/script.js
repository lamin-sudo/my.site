// ====== تهيئة Firebase ======
import { initializeApp } from "https://www.gstatic.com/firebasejs/10.8.1/firebase-app.js";
import { getAuth, signInWithEmailAndPassword, createUserWithEmailAndPassword, signOut } from "https://www.gstatic.com/firebasejs/10.8.1/firebase-auth.js";

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

// ====== تسجيل الدخول ======
document.getElementById("login-btn")?.addEventListener("click", function(event) {
  event.preventDefault();

  const email = document.getElementById("login-email").value;
  const password = document.getElementById("login-password").value;

  signInWithEmailAndPassword(auth, email, password)
    .then((userCredential) => {
      alert("تم تسجيل الدخول بنجاح!");
      window.location.href = "account.html"; // توجيه المستخدم إلى الحساب
    })
    .catch((error) => {
      alert("خطأ في تسجيل الدخول: " + error.message);
    });
});

// ====== تسجيل حساب جديد ======
document.getElementById("register-btn")?.addEventListener("click", function(event) {
  event.preventDefault();

  const email = document.getElementById("register-email").value;
  const password = document.getElementById("register-password").value;

  createUserWithEmailAndPassword(auth, email, password)
    .then((userCredential) => {
      alert("تم إنشاء الحساب بنجاح!");
      window.location.href = "account.html"; // توجيه المستخدم بعد التسجيل
    })
    .catch((error) => {
      alert("خطأ في إنشاء الحساب: " + error.message);
    });
});

// ====== تسجيل الخروج ======
document.getElementById("logout-btn")?.addEventListener("click", function() {
  signOut(auth).then(() => {
    alert("تم تسجيل الخروج بنجاح!");
    window.location.href = "login.html"; // العودة إلى صفحة تسجيل الدخول
  }).catch((error) => {
    alert("خطأ في تسجيل الخروج: " + error.message);
  });
});

// ====== القائمة الجانبية ======
document.addEventListener("DOMContentLoaded", function() {
  const menuToggle = document.getElementById("menu-toggle");
  const sidebar = document.getElementById("sidebar");

  if (menuToggle && sidebar) {
    menuToggle.addEventListener("click", function() {
      sidebar.classList.toggle("active");
    });
  }
});
