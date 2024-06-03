


export const routes = [
    {
        path: "/",
        component: () => import("./pages/Home.vue"),
    },
    
    {
        path: "/login",
        component: () => import("./pages/Auth/Login.vue"),
    },

    {
        path: "/dashboard",
        component: () => import("./pages/Dashboard.vue"),
        meta: { requiresAuth: true },
    },

    {
        path: "/home",
        component: () => import("./pages/Home.vue"),
    },

    {
        path: "/termin-wahl",
        component: () => import("./pages/TerminWahl.vue"),
    },

    {
        path: "/buchung-details",
        component: () => import("./pages/BuchungDetails.vue"),
    },
];





