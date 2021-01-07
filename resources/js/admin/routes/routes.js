import 
{ 
  DashboardLayout,
  Dashboard,
  UserProfile,
  TableList,
  Maps,
  Categories,
  Inbox,
  Orders,
  Users,
  Products
  } from '../pages'

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
        component: Maps
      },
      {
        path: "users",
        name: "Users",
        component: Users
      },
      {
        path: "inbox",
        name: "Inbox",
        component: Inbox
      },
      {
        path: "products",
        name: "Products",
        component: Products
      },
      {
        path: "categories",
        name: "Categories",
        component: Categories
      },
      {
        path: "orders",
        name: "Orders",
        component: Orders
      }
    ]
  }
];

export default routes;
