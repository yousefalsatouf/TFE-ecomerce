import DashboardLayout from "../pages/Layout/DashboardLayout.vue";
import Dashboard from "../pages/Dashboard.vue";
import UserProfile from "../pages/UserProfile.vue";
import TableList from "../pages/TableList.vue";
import Maps from "../pages/Maps.vue";

const routes = [
  {
    path: "/",
    component: DashboardLayout,
    redirect: "/",
    children: [
      {
        path: "/",
        name: "Dashboard",
        component: Dashboard
      },
      {
        path: "user",
        name: "My profile",
        component: UserProfile
      },
      {
        path: "tables",
        name: "Table List",
        component: TableList
      },
      {
        path: "locations",
        name: "Locations",
        meta: {
          hideFooter: true
        },
        component: Maps
      }
    ]
  }
];

export default routes;
