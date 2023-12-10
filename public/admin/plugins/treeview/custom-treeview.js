/*---------------------------------------------
Template name :  Dashmin
Version       :  1.0
Author        :  ThemeLooks
Author url    :  http://themelooks.com


** Custom Treeview JS

----------------------------------------------*/

$(function() {
    'use strict';

    $(document).ready(function () {
        var e = "#333333",
            t = "#8280FD",
            a = "#fff",
            l = [
                    {
                        text: "Parent Levels 00",
                        href: "#parent1",
                        tags: ["4"],
                        nodes: [
                            {
                                text: "Second Level 01",
                                href: "#child1",
                                tags: ["2"],
                                nodes: [
                                    { text: "Third Level 01", href: "#grandchild1", tags: ["0"] },
                                    { text: "Third Level 02", href: "#grandchild2", tags: ["0"] },
                                ],
                            },
                            { text: "Second Level 02", href: "#child2", tags: ["0"] },
                        ],
                    },
                    { text: "Parent Levels 02", href: "#parent2", tags: ["0"] },
                    { text: "Parent Levels 03", href: "#parent3", tags: ["0"] },
                    { text: "Parent Levels 04", href: "#parent4", tags: ["0"] },
                    { text: "Parent Levels 05", href: "#parent5", tags: ["0"] },
                ],
            o = [
                    {
                        text: "Parent Levels 01",
                        tags: ["2"],
                        nodes: [
                            {
                                text: "Second Levels 01",
                                tags: ["2"],
                                nodes: [
                                    { text: "Third Levels 01", tags: ["0"] },
                                    { text: "Third Levels 02", tags: ["0"] },
                                    { text: "Third Levels 03", tags: ["0"] },
                                ],
                            },
                            {
                                text: "Second Levels 02",
                                tags: ["3"],
                                nodes: [
                                    { text: "Third Levels 01", tags: ["0"] },
                                    { text: "Third Levels 02", tags: ["0"] },
                                ],
                            },
                        ],
                    },
                    { text: "Parent Levels 02", tags: ["7"] },
                    { text: "Parent Levels 03", href: "#demo", tags: ["11"] },
                    { text: "Parent Levels 04", href: "/index.html", tags: ["19"], selected: !0 },
                    { text: "Parent Levels 05", href: "http://www.pixinvent.com", tags: ["0", "available"] },
                ];


            $("#default-treeview").treeview({
                selectedBackColor: [e],
                data: l,
                expandIcon: "icofont-plus",
                collapseIcon: "icofont-minus",
                color: [e],
                showBorder: false,
            });


    });
})
