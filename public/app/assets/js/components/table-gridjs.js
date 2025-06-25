class GridDatatable {
    init() {
        this.GridjsTableInit()
    }
    GridjsTableInit() {
        document.getElementById("table-gridjs") && new gridjs.Grid({
            columns: [{
                name: "ID",
                formatter: function (e) {
                    return gridjs.html('<span class="fw-semibold">' + e + "</span>")
                }
            }, "Name", {
                name: "Email",
                formatter: function (e) {
                    return gridjs.html('<a href="">' + e + "</a>")
                }
            }, "Position", "Company", "Country", {
                name: "Actions",
                width: "120px",
                formatter: function (e) {
                    return gridjs.html("<a href='#' class='text-reset text-decoration-underline'>Details</a>")
                }
            }],
            pagination: {
                limit: 5
            },
            sort: !0,
            search: !0,
            data: [
                ["11", "Alice", "alice@example.com", "Software Engineer", "ABC Company", "United States"],
                ["12", "Bob", "bob@example.com", "Product Manager", "XYZ Inc", "Canada"],
                ["13", "Charlie", "charlie@example.com", "Data Analyst", "123 Corp", "Australia"],
                ["14", "David", "david@example.com", "UI/UX Designer", "456 Ltd", "United Kingdom"],
                ["15", "Eve", "eve@example.com", "Marketing Specialist", "789 Enterprises", "France"],
                ["16", "Frank", "frank@example.com", "HR Manager", "ABC Company", "Germany"],
                ["17", "Grace", "grace@example.com", "Financial Analyst", "XYZ Inc", "Japan"],
                ["18", "Hannah", "hannah@example.com", "Sales Representative", "123 Corp", "Brazil"],
                ["19", "Ian", "ian@example.com", "Software Developer", "456 Ltd", "India"],
                ["20", "Jane", "jane@example.com", "Operations Manager", "789 Enterprises", "China"]
            ]
        }).render(document.getElementById("table-pagination")), document.getElementById("table-search") && new gridjs.Grid({
            columns: ["No", "Tgl Pembuatan", "PIC", "PIT", "Shift", "Waktu", "Diketahui", "Aksi"],
            pagination: {
                limit: 5
            },
            search: !0,
            data: [
                ["Alice", "alice@example.com", "Software Engineer", "ABC Company", "United States"],
                ["Bob", "bob@example.com", "Product Manager", "XYZ Inc", "Canada"],
                ["Charlie", "charlie@example.com", "Data Analyst", "123 Corp", "Australia"],
                ["David", "david@example.com", "UI/UX Designer", "456 Ltd", "United Kingdom"],
                ["Eve", "eve@example.com", "Marketing Specialist", "789 Enterprises", "France"],
                ["Frank", "frank@example.com", "HR Manager", "ABC Company", "Germany"],
                ["Grace", "grace@example.com", "Financial Analyst", "XYZ Inc", "Japan"],
                ["Hannah", "hannah@example.com", "Sales Representative", "123 Corp", "Brazil"],
                ["Ian", "ian@example.com", "Software Developer", "456 Ltd", "India"],
                ["Jane", "jane@example.com", "Operations Manager", "789 Enterprises", "China"]
            ]
        }).render(document.getElementById("table-search")), document.getElementById("table-sorting") && new gridjs.Grid({
            columns: ["No", "Email", "Position", "Company", "Country"],
            pagination: {
                limit: 5
            },
            sort: !0,
            data: [
                ["Alice", "alice@example.com", "Software Engineer", "ABC Company", "United States"],
                ["Bob", "bob@example.com", "Product Manager", "XYZ Inc", "Canada"],
                ["Charlie", "charlie@example.com", "Data Analyst", "123 Corp", "Australia"],
                ["David", "david@example.com", "UI/UX Designer", "456 Ltd", "United Kingdom"],
                ["Eve", "eve@example.com", "Marketing Specialist", "789 Enterprises", "France"],
                ["Frank", "frank@example.com", "HR Manager", "ABC Company", "Germany"],
                ["Grace", "grace@example.com", "Financial Analyst", "XYZ Inc", "Japan"],
                ["Hannah", "hannah@example.com", "Sales Representative", "123 Corp", "Brazil"],
                ["Ian", "ian@example.com", "Software Developer", "456 Ltd", "India"],
                ["Jane", "jane@example.com", "Operations Manager", "789 Enterprises", "China"]
            ]
        }).render(document.getElementById("table-hidden-column"))
    }
}
document.addEventListener("DOMContentLoaded", function (e) {
    (new GridDatatable).init()
});
