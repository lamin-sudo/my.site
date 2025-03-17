// ====== تحميل Firebase ======
import { initializeApp } from "https://www.gstatic.com/firebasejs/10.8.1/firebase-app.js";
import { getAuth, signInWithEmailAndPassword, createUserWithEmailAndPassword, signOut, onAuthStateChanged } from "https://www.gstatic.com/firebasejs/10.8.1/firebase-auth.js";

// ====== تهيئة Firebase ======
const firebaseConfig = {
  apiKey: "AIzaSyBhOJQjj7kDhe2f7P3q8fJ0zoTXJmRH960",
  authDomain: "mystore-9e92b.firebaseapp.com",
  projectId: "mystore-9e92b",
  storageBucket: "mystore-9e92b.appspot.com",
  messagingSenderId: "620837836452",
  appId: "1:620837836452:web:bd1b2e179acbd5d1733831"
};

// بدء التطبيق
const app = initializeApp(firebaseConfig);
const auth = getAuth();

// ====== عند تحميل الصفحة بالكامل ======
window.onload = function() {
  console.log("📌 الصفحة تم تحميلها بالكامل");

  // التحقق من حالة المستخدم
  onAuthStateChanged(auth, (user) => {
    if (user) {
      console.log("✅ المستخدم مسجل دخول:", user.email);
      if (window.location.pathname.includes("login.html") || window.location.pathname.includes("register.html")) {
        setTimeout(() => {
          window.location.href = "account.html"; // تأخير التوجيه
        }, 1000);
      }
    } else {
      console.log("❌ المستخدم غير مسجل دخول");
      if (window.location.pathname.includes("account.html")) {
        setTimeout(() => {
          window.location.href = "login.html";
        }, 1000);
      }
    }
  });

  // ====== القائمة الجانبية ======
  const menuToggle = document.getElementById("menu-toggle");
  const sidebar = document.getElementById("sidebar");

  if (menuToggle && sidebar) {
    console.log("✅ القائمة الجانبية متاحة");
    menuToggle.addEventListener("click", function() {
      console.log("📌 تم النقر على زر القائمة!");
      toggleMenu();
    });
  } else {
    console.error("❌ خطأ: القائمة الجانبية غير موجودة!");
  }

  // ====== تسجيل الدخول ======
  const loginBtn = document.getElementById("login-btn");
  if (loginBtn) {
    loginBtn.addEventListener("click", function(event) {
      event.preventDefault();
      const email = document.getElementById("login-email").value;
      const password = document.getElementById("login-password").value;

      signInWithEmailAndPassword(auth, email, password)
        .then(() => {
          alert("✅ تم تسجيل الدخول بنجاح!");
          window.location.href = "account.html";
        })
        .catch((error) => {
          alert("⚠️ خطأ في تسجيل الدخول: " + error.message);
        });
    });
  }

  // ====== تسجيل حساب جديد ======
  const registerBtn = document.getElementById("register-btn");
  if (registerBtn) {
    registerBtn.addEventListener("click", function(event) {
      event.preventDefault();
      const email = document.getElementById("register-email").value;
      const password = document.getElementById("register-password").value;

      createUserWithEmailAndPassword(auth, email, password)
        .then(() => {
          alert("✅ تم إنشاء الحساب بنجاح!");
          window.location.href = "account.html";
        })
        .catch((error) => {
          alert("⚠️ خطأ في إنشاء الحساب: " + error.message);
        });
    });
  }

  // ====== تسجيل الخروج ======
  const logoutBtn = document.getElementById("logout-btn");
  if (logoutBtn) {
    logoutBtn.addEventListener("click", function() {
      signOut(auth).then(() => {
        alert("✅ تم تسجيل الخروج بنجاح!");
        window.location.href = "login.html";
      }).catch((error) => {
        alert("⚠️ خطأ في تسجيل الخروج: " + error.message);
      });
    });
  }
};

// ====== دالة فتح/إغلاق القائمة الجانبية ======
function toggleMenu() {
  var sidebar = document.getElementById("sidebar");
  if (sidebar) {
    if (sidebar.style.left === "0px") {
      sidebar.style.left = "-250px";
    } else {
      sidebar.style.left = "0px";
    }
  } else {
    console.error("❌ خطأ: عنصر القائمة الجانبية غير موجود!");
  }
}
