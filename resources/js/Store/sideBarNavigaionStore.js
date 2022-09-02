import {defineStore} from "pinia/dist/pinia";

export const useSidebarNavigationStore = defineStore('sideBarNavigation',{
    state: () => {
        return {
            active_tab: null,
        }
    },
    actions: {
        set_active_tab(state, payload) {
            state.active_tab = payload
        },
    }

})
