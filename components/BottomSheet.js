import React from 'react';
import axios from 'axios';
import { useEffect, useState } from 'react'
import ReactDOM from 'react-dom'
import { BottomSheet } from 'react-spring-bottom-sheet'

// if setting up the CSS is tricky, you can add this to your page somewhere:
// <link rel="stylesheet" href="https://unpkg.com/react-spring-bottom-sheet/dist/style.css" crossorigin="anonymous">
import 'react-spring-bottom-sheet/dist/style.css'

export default function MobileMenu() {
    const [open, setOpen] = useState(false)
    const [navItems, setNavItems] = useState([]);

    function onDismiss() {
        setOpen(false)
    }

    useEffect(() => {
        axios.get('/wp-json/menus/v1/menus/main-menu-mobile')
            .then(res => setNavItems(res.data))
            .catch(err => console.log(err))
    }, [navItems.count]);


    return (
        <>
            <button className='btn fab' onClick={() => setOpen(true)}><i className="isax isax-menu-hamburger"></i> Menu</button>
            <BottomSheet open={open} onDismiss={onDismiss} snapPoints={({ minHeight }) => minHeight}>
                <a href='/'>
                    <h3 className='website-name-full'>
                        Woodhouse
                    </h3>
                </a>
                <ul className='mobile-menu'>
                    {navItems.items?.map((menuItem) =>
                        <li key={menuItem.id}>
                            <a href={menuItem.url} onClick={() => setOpen(false)} rel={menuItem.acf.open_modal ? 'modal:open' : ''}>
                                <i className={'isax isax-' + menuItem.acf.icon}></i>
                                {menuItem.description ? menuItem.description : menuItem.title}
                            </a>
                        </li>
                    )}
                </ul>
            </BottomSheet>
        </>
    )
}


ReactDOM.render(React.createElement(MobileMenu), document.getElementById("launchBottomSheet"));