document.addEventListener("DOMContentLoaded", async () => {
  const res = await fetch("api/dashboard_data.php");
  const data = await res.json();

  // Helper ...
  const fillMonths = (obj) => {
    const filled = [];
    for (let i = 1; i <= 12; i++) {
      filled.push(obj[i] || 0);
    }
    return filled;
  };

  const monthLabels = ["T1", "T2", "T3", "T4", "T5", "T6", "T7", "T8", "T9", "T10", "T11", "T12"];

  // Đơn hàng theo tháng
  new Chart(document.getElementById("ordersChart"), {
    type: "bar",
    data: {
      labels: monthLabels,
      datasets: [{
        label: "Đơn hàng",
        data: fillMonths(data.orders_per_month),
        backgroundColor: "rgba(54, 162, 235, 0.6)"
      }]
    },
    options: {
      responsive: true,
      plugins: {
        legend: { display: false }
      },
      scales: {
        y: {
          beginAtZero: true,
          ticks: {
            precision: 0,
            stepSize: 1
          }
        }
      }
    }
  });

  // Doanh thu
  new Chart(document.getElementById("revenueChart"), {
    type: "line",
    data: {
      labels: monthLabels,
      datasets: [{
        label: "Doanh thu (VNĐ)",
        data: fillMonths(data.revenue_per_month),
        borderColor: "rgba(153, 102, 255, 1)",
        fill: true,
        tension: 0.4
      }]
    },
    options: {
      responsive: true,
      plugins: {
        legend: { position: "top" }
      }
    }
  });

  // ✅ Thêm đoạn này VÀO ĐÂY, bên trong:
  const topProductsTable = document.getElementById("topProductsTable");
  data.top_products.forEach((product, index) => {
    const row = document.createElement("tr");
    row.innerHTML = `
      <td>${index + 1}</td>
      <td>${product.name}</td>
      <td>${product.quantity}</td>
    `;
    topProductsTable.appendChild(row);
  });
});
