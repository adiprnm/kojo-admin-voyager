<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $invoice->code }}</title>
    
    <style>
        table.customer-information th, table.customer-information td {
            vertical-align: top;
            text-align: left;
        }

        table.order td, table.order th {
            padding: 5px;
        }

        table.order thead {
            font-weight: bold;
        }

        table.order {
            border-collapse: collapse;
        }

        table.order thead th, table.order thead td, table.order tbody td, table.order tfoot td.order-footer {
            border-collapse: collapse;
            border: 1px solid black;
        }

        body {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif
        }

        thead tr {
            text-align: center;
            vertical-align: middle;
        }

        img.rotated {
            transform: rotate(-5deg);
            height: 70px;
            width: auto;
        }

        body {
            font-size: 10pt;
        }
    </style>
</head>
<body>
    <div style="padding: 0px">
        <table>
            <tr>
                <td>
                    <img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wBDAAUDBAQEAwUEBAQFBQUGBwwIBwcHBw8LCwkMEQ8SEhEP
                            ERETFhwXExQaFRERGCEYGh0dHx8fExciJCIeJBweHx7/2wBDAQUFBQcGBw4ICA4eFBEUHh4eHh4e
                            Hh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh7/wAARCABkAQADASIA
                            AhEBAxEB/8QAHQAAAgIDAQEBAAAAAAAAAAAAAAcGCAQFCQMBAv/EAEcQAAEDAwIDBAQJCgUEAwEA
                            AAECAwQABQYHERIhMQhBUWETInGBFDI3QnN1obKzFSMzNDU2YnKRsRYXQ1LBOIKS8GOi0dL/xAAa
                            AQACAwEBAAAAAAAAAAAAAAAEBQACAwEG/8QAMxEAAQMCAwUGBgIDAQAAAAAAAQACAwQREiExBRNB
                            UXEiYYGxwdEyM0KRofAU4TRS8VP/2gAMAwEAAhEDEQA/AHlk2iNguLkqYxkmW295wqcIYuqigKJ3
                            PqqB2G/cCKpPMybJmJbzKcju5CFqQCZjm52JHj5V0sl/qrv8h/tXL+6ftOV9Mv7xr0Ox5HS4w83t
                            ZMqJxffFmrj6U6PWq9YTZcgu2U5dJkT4bUhxtN0UhtJUkEgADfbn409oEVuFBYhs8ZbYaS2njUVK
                            ISABuTzJ5daiuiPyQ4n9Ux/uCpiSBz6Ck1TK98hDjoSgZXlzjdLvVXS6PnL6JrWSXuyT22g0hcOS
                            Q0QCSOJvlv1PMEVV274HqEnUo4PjmaycglIAVIejy3koiDfb88SSEkd4BJ5gdeVWFzLNb5m1+kYJ
                            pi8EFs+ju9/HNqEk9UNn5zhG4BB5Hp3kTnTnCLHgtiFrs7JK1njkyneb0lzvWtXeT4dBRkVTJSx2
                            dmeA5d59At2Suibn9lCdHdHpmHXBm9X/ADC7Xq5tpUEs/CFiMgqGx9VR3X1PM7eO1N+iil8sr5XY
                            nnNDPeXm5RRRRWaqioznmb45hNt+G3+4IZKgS0wn1nXSO5Kf+elRXXLViBp/b/gcQNy79IRuywfi
                            tJ/3r8vAd/20kLBgs3JmXtRtW769brQv84kunZ+SOoShPzUkdAASR0AHOmNLQh7RLMbN4cz0RMUA
                            cMb8h5rZZNrrneYXBVqwK0vQkK3CfQtF+SoeO4BCfcPfUUvenmbST+Uc8yS32haxxA3m58Tp9iE8
                            SvcBWVlGsKoUNdh01tbWM2hPql9tI+FPgcuJSufCT7SfPuqFWDE80zWYt+22q43RxxXryVglJJ6l
                            Tijtv7TvXoIYd024AjHfmfE8PymTGYBcANH5X25WHGIe6UZvHmLHX4NAeKT7CoJ3HuqOSm2m3ilh
                            8PIHRYSU7+48xTQRobkjCN7zfcYs570SrmkKH9AR9tfRoldZHq2zMMPuDnc21c0lR8hyNbtq4Rq+
                            /wC9wVxMwfUlfFkSIryXor7rDiTuFtqKVD2EHemZg+uud42421Jn/lqGk7KZnHiVt4Jc+MD4bkjy
                            qP5VpfnONMmRcsfkmMBuX4+zzYHiSgnYeZ2qHHqR0NauZBUtzs4K5DJRnmrxaXav4rnQRFZeNuup
                            HOFIUApR/gV0WPt8qY9c2GHXWHkPMuKbcQriStJIUkg7ggjmCD31Z3s/63quLsfFsxkj4WrZuHPX
                            /qnoEOd3F3BXeevPmfP1+yDGDJDmOSW1FHhGJmisVRRRSJAIqJZ/j2TXxEc45mcnHHGgoLDcVt5L
                            pO224Vz5eVS2irMcWG4XQbG4VG8x1U1bx3O7hiy85ekLhTDF9OIrSQv1gOLh4Tt16b1afT3F81tM
                            0Tsm1BkX9Cmin4L8BbZb4jt6249bceG9Uw1o+X3IvrpX3xXQhj9Aj+UU42lZkceEAYhnkO5G1Vmt
                            bYar0pMaya0jHL01hmGwU3vK5Kw0Gx6zcdSugVsRurv4dwB1JqTa+Zz/AIA04m3dhSfyg8fg0FJ5
                            /nVA+tt4JG6vcKSvYnxU3O6XnUG68UmQh0xozjnMlxQ4nV7/AO7ZSRv/ABGhKaBoidUSC4Gg5lYx
                            RjAZHaBMywaV3+9RkztTMzvV0mujiVAgy1RojBPzQEbcRHTfl7+tZ0/RiyNMleM37JMdnAbtyItz
                            dWAf4kLUQoeXKmjRWBqpb3Bt3cPss96++qrzB1Vy3TPMGsR1ZS3NgSDvCvrDfDxp323WkddtwDts
                            R377g1YCK+zLjNSozqHmHUBbbiFApWkjcEHwpa9pjDGcw0quQSylU+2oVNiL29YFA3WkeSkgjbx2
                            pZ9irUJ+bElYDdH/AEiorZkW5Sjz9HuAtv2AkEeRPlRL4mzwGdgsRqPVauYJI943Uaqy8v8AVXf5
                            D/auX90/acr6Zf3jXUCX+qu/yH+1cv7p+05X0y/vGjdh/X4eqIoPq8F0Q0XcQ1o5izjq0obRaGFK
                            Uo7BICAeflS1yDUP/NXOjpphl/btlsCFKuNzSrZ6UhO3E1H/AKn1u8AnoOcZsUHULVLRyFYrBxWD
                            H7fakMh14bOXZ9CAChO23C1uCN+/v35gVphyLxi2SNyGFP2+622RyJBStpxB2IIPmCCDyI3FSmoW
                            ve9xd2hew5ciVyKnDnON810hw/GbLiViYstihIiQ2RySkeso96lHqpR8TW6pf6G6jwNR8OauTZQ1
                            c44DVwjA/o3NuoH+1XUH3d1MCksrXteQ/VAvDg4h2qKKKKzVUVD9Wc1h4Hh8m9SOFcg/m4jBP6V0
                            jkPYOZPkKmFVF1xu0vUrWuHh1seKokSQITW3NIcJ/OuHx22I9ifOjaCmE8va+EZnot6eISPz0Gq8
                            dMbGxeXbnq7qS+p21RXS4hDg/XHx0SB3pB2AHQnYdAahmoma5DqZlTZLTqmi56K325kEpbBOwAA6
                            qPLc7c/IACt72gMojSLnFwawKLWP46kRm0pPJ55I2Ws+JB3APjue+tpYExtI8CYyeUw27mV8aP5M
                            acSD8BYI5vEH5xB7/EDpuK9Iw4bTEdo5NHIf8zJ8EzGXbIzOg5LzaxnDdL4bU3Om0X/JnEBxmxtL
                            Hoo+43BeUNwe7lzHkRzEXy/VnM8iQYouJtVtA4UQbcPQNJT3J9Xmoe0keQqFT5cq4TXps19yRIeW
                            VuuuKKlKUTuSSeprxoplML45O078DoOC2bEL3dmV9Wtbiyta1KUepUeZ9pNfASDvvRRRS1UoxLUD
                            MMWdSqzX2W00DuWFrLjSvIoVuPeAD51PY9xwLVXaHeIkbEssc2DU5gcMSWs9zifmknv+09KTVAJB
                            3B22oeSmY44m5O5j9z8Vm6IE3GRW5zPGLziV9es18iKjyGzuk9UuJJ5LSehSfH3HYgitMCUkFJII
                            PIg7GnNgd1jan4x/l7kzyfy1GbKrBcXPjcSRuWFqPMggbc9+Q8QN1DcoUm23CRb5rSmZMZ1TbqFD
                            YpUkkEH3ipBK5xLH/EPz3hSN5PZdqFbfsx6lryyxnHbw/wAV4tyBwOKO6pDI5BR/iT0PtB8adVc8
                            cEyOZieWW+/wlEORXgpSQdgtB5KSfIpJHvroFZ58a62qJc4aw5HlspeaV4pUNx/evMbXoxBLjbo7
                            zSqsh3b8Q0KzKKKKUoNc89aPl9yL66V98V0IY/QI/lFc99aPl9yL66V98V0IY/QI/lFOdqfLh6ey
                            Nq/hZ09lUbt13xx/K7FjyF/mYsRUpaQfnuKKRv7Aj7acPZGhoh6GWdSQAqS6++s+JLihv/RI/pVc
                            e2Q6t3W6YlROzcOOlPs4Sf7k1Zrsr/IVjv8AI7+Kur1bcGz4wO71VphhpmhNCiiikaAXlKZRIjOx
                            1gFDiChXsI2rnjpXdF4prZaJbay2iPdfg7gB23QpZbUD5cKjXROuZF8dUzmc55BIU3cXFJI7iHCR
                            /anexm4hI08QPVH0QuHBdMpf6q7/ACH+1cv7p+05X0y/vGuoEv8AVXf5D/auX90/acr6Zf3jV9h/
                            X4eqtQfV4Lonoh8kOJ/VUf7gpL9r/Sb4fGc1Ax+NvKYSPyoyhP6RsDk6AO9I5K8Rse6nRoj8kOJ/
                            VMf7gqXOtoeaU04hK0LBCkqG4I8DS1tQ6nqS9vNCNkMchcFzl0izy56eZjHvkAqcYJDcyNxbJfaJ
                            HEk+Y6g9xA7t66EYpfrZk+Pw77Z5CX4UtsLbUOo8UnwIPIjxqlXad0qXgWTG7WphX+HrksqZIB2j
                            OHmWifDvT4jcdxrJ7LmrCsIyAWC9Pn/D9xcAKlHlFdPIOfynlxe491OK2nbWRCeLXz/sI2eMTs3j
                            NVeKivy2tK0JWhQUlQ3BB3Br9V5tLFpM5vCcew673pRAMOI46nfvUEnhHvOwqnmjc82hOW5y+ril
                            W23qTGWrmfhMhXAlXPvHrk++rF9qaWqJozdAgkGQ6yz7QXAT9gqp8aZ8H0xmQ0HZUy7NFe3VSG2l
                            HY+QKwa9FsmEOpnH/YgeGV/VMqNl4z3lZ+jGOoy3UmBDnEqiNqVLmqUeRbb9ZW58Cdhv51h6rZS7
                            mGc3G8qJEcuFqI2OjbKCQgAdByG527yaluiyjbNP9RMib5Ps2xEJtQ6p9MogkHuPIH3ClTTiMY53
                            OP02A8z6I1uchPLJFekSO/LktxorLj77ighDaElSlEnYAAcyT4V50xeznfLJj+qMKdfltsxy0tpt
                            9weqy4oAJUfAbbjfu3reZ5jjLgLkDRXe4taSAolkWL5HjoaVfbJPtyXv0ZkMqQFeQJGxPl1rEslo
                            ul7nJgWe3yZ8lQJDTDZWogdTsByHnVqe1Hl2JyNNHrS1coNwnynW1RW2HUuFHCoErPCTwjh3G/fv
                            UE7IOS45ZbneYN3lRoUyYlsx331BKVJTxcSAo9DuQdu/3UvjrpXUpmLMxwQ7ah5iL8OaSd9s12sU
                            4wbzbpVvlAblp9soVsehAI5jzFYFWB7X+TY3eZFmt1qlxp0+IXFPvMLCwhCgAEFQ79wTsDy259ar
                            9RdJM6aFr3CxK2heXsDiLL3t0uRb58edDdUzIjuJcaWk7FKkkEEewgUz9fI8a9RMe1GgNpbbv8Xh
                            mJSOSZTYCV/1+3hJ8aVNNa1H8rdmW7x1+sqy3pt9sn5qXUhJA8tyT765Udl7JBzt4H+7LkmRa7w+
                            /wDaVNXJ7Jt9VdtK0QXnON61yVx+vPgPrp+8R7qptVjuxLNUJuS28n1S2w8keYKkk/aKF2xGH0pP
                            Kx9FlWtvETyVm6KxrhNh26G5Mny2IkZsbreecCEJHmTyFedoultu8JM21T4s+Ko7JejupcQT4bpJ
                            G9eOsbXSWxVANaPl9yL66V98V0IY/QI/lFc9tZfX1+yHbmTe1D38YFdCmRsygHrwjenO1Plw9PZG
                            1fws6eypR22beqLq6zM2IRMtrS0+1KlJP9hViOyqoL0Kx4pO+yXgfb6VdQvtt4i5dcKgZTFaK3bO
                            6W3wB/ouEDf2BQT7OI1l9iS/NXDS+TZCsGRa5q/V7/Ruesk/+XGPdUmfvdnNI+k5rrziphbgn3RR
                            RSZAoPIVzVjQjedTm7e0CozLwG0gDqFPbf2NdDc+vTGOYVeb5IWEohQ3HRudt1BJ4UjzKth76px2
                            RMUeybVlu+SEFUSzAy3FEci8rcNp9u+6v+2nWy3bqKWU8EdSHAxzyrvy/wBVd/kP9q5f3T9pyvpl
                            /eNXwyDRiJfZLz1wzjM1peWpRaFy2bSCSeEJ4eg322qMnsrYASSbnfiT1/Po/wD4rmz6mClxYnXv
                            bgpTSxxXudUydEfkhxP6pj/cFTKk9ZtBbTZkpRas1zOEhAAShm5cKQP5Qnb7KbMBgxYTEZTzr5Zb
                            Sguuq3WsgbcSj3k9aW1GAvLmOvfushZMN7grWZtjNry/GZmP3hkOxJSOE+KFfNWnwUDzFc8tTcMu
                            mBZfLx66J3U0eJh4AhL7RJ4Vp/pzHcQR3V0AzvEjlbEdn/EV8s6WeIq/Jsn0Jc32+Mdjvtt9tLW5
                            9mnELq+JFzyLJ5roGwXImJcVt4bqSaP2dWMpr43ZHhZEU0zYtSo32Q9WvynEawHIZO82Og/kx9Z5
                            utgblok/OSOniOXcN7LUhWey3gbDqXmbtkDbiCFJWiQgKSR3g8FMrT3BkYcX0s5Jf7q06hKUt3KX
                            6ZLe2/NPIEE7/ZQ9YaeR5fEdeFlnOY3EuYVEu1s2pejshSRuETWFK9nER/yKpuXnDGEcq/NpWXAP
                            4iACf6AVenX21KvGkeQRW0lTjcb4QkDv9GQs/Yk1RKnuw3A05HIo+gN4yO9NTTMen0O1Hjo5rSIb
                            xA68KVq3NKuml2cZDMrI7xiUpYSxkNqeiJJPIOhJUg+0et9lLOfFegzn4Ulstvx3VNuJI2KVJJBB
                            9mxphD2ZpG9D+LeiIZk9w8V41uMLxq65bkUaxWZkOSn9zuo7JQkDcqUe4AdfcBuSK09TLRzNBgec
                            R767GMmN6NTMhtJ2VwK23KT4ggEA9diOW+9azF4jJYLm2Su8uDTh1W51P0YyfA7Mi8S5EOfB4kod
                            cjFW7Kj04goDkTyBHf12rS6Xad33UK6PxLQWGWo6Qp+S+SEN77gDkCSTsdgB3HfamlrrrfYsswtz
                            HMdiTD8LUhUh6SgICEpUFcKQCdySBv3AeNRTs76oQdPp1wjXiK+7bp/AorYSFLbWncDkSNwQSOvL
                            YUBHLWGlLnN7fD/iHa+YwkkdpRrVPTi/aeT48e7FiQxJSSxJYJKFkbbgggbEbj+vLeoZTc7ROqdv
                            1Bft8GzRX2rfBKnPSvpCVuLUAOQ3OwAHtPltSjoukdK6IGYWctoS8sBfqimrhH5js7Z085yTImxG
                            Ub95Cwo7ee1KqmzmaDjPZ/xmwOepMvkxd1fQeRDYHC3uPAgpI9hrlVngZzI/GfopLnYd490pqsH2
                            J0KOSZE5t6qYbST7Ssn/AINV8q03YstSmcbvt5UnYSZSGEHxDaST9q6w2s4NpHX4281nWG0JWP26
                            nbijBLI3HLgguTyJPD8UqCCUBX/2I8xX3sPWqVCwK7Xt+4FUOZL4G4xPqtFtPrL37iriA/7RT0ym
                            wWjJ7JIst9hNzYMgbLbX49xBHMEeIpX2/QWFaLdOtFgznKLXaJ5JkQmnWylQI2IBKdxuNgSOo671
                            52OpjdS7hxsb8ktbK0xbs5Ks1lguahdo5QgJLzE2+rkrUByDCXSpSj5cI+0Vf+oNphpbiOnjDosM
                            NZlPAB6XIXxvLHhv0SPIAVOazrqps7gGaAWVaiYSEYdAsS6QYl0tsm3T2EPxZLSmnmlDcLQobEH3
                            VUyPar32ctV/yqpmROwy5K9A5IQknZsndIVt0cR5/GG+3U7W+rFuUGHcoTsK4RWJcZ1PC4y8gLQo
                            eBB5GsqapMN2kXadQqRS4Lg5grwsN3tl9tTF0tE1mbCfTxNvNK4kkf8A75d1bBRCQSSAB30rxotY
                            rbNdl4ffb/iinVcS2rdL/MKP0awof+91fZ+ksi8NmPkmoeW3WIr48b4Q2w2seCg2kEj31wxwk3D8
                            umft+VzCzgUsO0Rmc7Um8R9LNO0KunE8F3KQwd290nkkqHLgSealb9dgKc+jGn8DTnDGbJGUl6Us
                            +mmyQNi86Rz28EgcgPD2mtzhuH43h9u+A43aI1vaPxyhO63PNSzupR9prf1eapBjEMYs0fcnmVZ8
                            t2hjdFFNSM8sGBWhM+9PrU48r0cWIyOJ6Sv/AGoT7xz6CsKzzdRr1ERPcg2THW3RxNxZSXJT4B5j
                            j4VISk+Q32pDYjdDqb2u1ypyvT26yemMJlXNKUsnhSoDxK1cXt28BVsa7PEKcNbbtEXPsuyMEYA4
                            pU6n6j5Lp1i0m5XrGWbgobIjS4Lx+DlxR2HpUq2W37uIHpuDTDxic7dMbtlyeShLsuI0+tKPigrQ
                            FEDy51hah43Gy/CrrjkrhCZsdTaFEfEX1Qr3KAPurNxiC7a8atlteUhTsSG0w4U/FKkICTt5cqxe
                            6N0YsLOuqEtLdM1ptRb7kGN2SXerVZ4FxiQorsmUHpimXAEJKjwjgUDyHiKhWjOq2RamIfl2/F4E
                            OBFfS1JceuCuMb8/VSG+Z28wPOp1q18leW/Usz8BdJbsH/ubkX1g3+HREUbDSveW5gjnxWjGt3Rc
                            RmFZCiiigUOvKUw1Ijux3khTbqChYPeCNiK586h48/iuaXSwvpIMV8pbJG3E2TuhQ9qSDXQuq/dr
                            jAV3O1NZpbGCqTBR6OclI5qZ35L27+Enn5HypvsepEM2B2jvPgjKKXA/CeKrFZblLs93iXWC4W5U
                            R5LzSgeikkEe7lzHhTN1utEW/QIWqWPNb267AIuLaBv8FlgAKCtu5R5795594pT1ONKc6/wpKk22
                            6xBcscuafRXGCrmCk8uNA7lDu6b9NwdiPSzscCJWajhzHL2TSRpuHN1Cg9FMfUPTRUCCMpw6Qb7i
                            z/rofa9ZyNv1Q6nqCOm5Ht2pcVrFK2VuJpV2PDxcIooorRWRRRUu060+vuaS1GI2mJbGecq4yPUY
                            YT1JKjsCQO4Hfx2HOqPkbG3E42Cq5waLle2j+GnL8oSJavQWWAn4Tc5KuSG2k8yCe4q2I9m57q/W
                            quQyM6y+5XqEwpNrgNpZjJ+azHSoJR7OInfbzPhUsyS7xpsaNpNpVHdkQ3XQJs0DZy4Og81E9zY2
                            33PLYDuHPV6tx7Vhllh6eWl5Ema2sS73LR/qP8JCGh/CgEnbz3PPegWSF8wcRmdByHEnr+8VgHEv
                            BPh05pZISpa0oQkqUogAAbkk8gBV99HMaOJacWizOICZCWfSyBt/qrPEoe4nb3VWfsvYCvKMxTfZ
                            zHFabSsOEqHJ18c0IHiB8Y+wA9auTSrblSHOELeGZQlfLchgRUY1Qyg4Xgd0ydMMTDAbSv0BXwce
                            60p67Hb41SeorqxjD2Zaf3TGY8hEdycltHpVgkJAcSonl37JPvpHFhxtx6XzQDLYhfRaLAsvzfL8
                            Tg5HDxizQ401JWy3KuTiXCniICtkskbHbceW1RXDNab/AJVqHcsIg4tbWZ9vU8l1164rDSi0vgVw
                            kNknc9OQ5eFOWzW6NabTEtcJAbjRGUstJ8EpAAH2VVTs8f8AVflv0tx/HFHQNilbK7DoLjX3W7Ax
                            webaJraraqZTpy3bHr1idulR57xZS5DuK1BChtyVxNJ5kE7dehpusOelYbc2240hW3tqH6yYUjPc
                            IfsQcaZkh5t+K64CUocQrfc7c9iOIe+phGQWo7bZO5SgJPuFCyOjMbcIs7O/osnFpaLDNKPWfVXI
                            tM0My5+LwJkCU+pmO41cVcZ2G/rJLfI7eBI86menN+yHJLJEvV1s8C3Q5sVuRGDMxTzhCwFDiHAA
                            OR8TSe7eH7lY99YL/DNOTSH5K8S+pYn4Ka3kjYKVkgbmSVo5rd0HWzKz8rl5BChh+w22DPWkEuok
                            ylM8hz9UhCt/ftSo0o1pyPUe7TrfZcRt7CoKUrfXJuSkpAUSBtwtknoadVw/Z8j6JX9qqt2Fv3uz
                            D6Br8RdSnjY6nke5ty235Uia0xuJGijnY1Do10uCXt/SC3SQvfrv6Vvf/mrqVVG0Ws6V9rZLk5Po
                            LPf1PCI+eSPzx3Cd+gIcATt5g99WurTabg+Rsg0ICtVHE4OHEIoqMaoZM1iGA3jIXCAuJGUpkH5z
                            p5IHvURWTp/Nk3LA8fuM10uypNsjPPOEAca1NJUo7DxJNAYDgx8L2Q+E4cSxtWvkry36lmfgLpLd
                            g/8Ac3IvrBv8OnTq18leW/Usz8BdJbsH/ubkX1g3+HRsP+FJ1C3Z8h3UKyFFFLTSDOH80yfNiiQH
                            LZbbi3FggJGwSlBClA7c+JQJ5k9RtQTYy5pcNAsA0kE8ky68pDTT7DjDzaXGnElK0KG4UDyIPlXr
                            RVFVUx7QWk8nCrq5eLQyt3HpK90kczFUfmK8t/inw5d3NSV0gnw4s+E9Cmx25EZ5JQ404kKSpJ6g
                            g1WHWDs+ToLr13wZCpcM7rXb1Hd1rx4D88eR5jzr0+ztrNcBHMbHnzTWmrARhfqk/g2a5Hhk8y7F
                            PUyle3pmFjiadHgtB5Hly35EdxFTlzI9JszJXk2Py8Wui+a5tpIUwtR+cpsjl47AE+dKiVHkRX1x
                            5LLjDzZ4VtuJKVJI6gg7EH21502fTsecYyPMfuaMdG1xvoU1Tplhk717Lq1YFIPxUTkKjr94J3+y
                            gaU49H9e56sYmy31PoFqdV/4ggmlVRVdzL/6H7D2XMD/APbyTaR/kpif530l1zacnmlBT8Gi7jx6
                            KI/qD4ViXDKc31SmN4zZYjNvtDY3TAhJDUZhA+c6rkNh15nbfoN6WFZTVxntQV29mW+3FcVutlCy
                            ErPcVAddu7ffap/FA7V7u5nO3houbrjqe9ORzKcW0lsL9nwuQxesrko4Jl4SN2o+/VLXjt3bctxu
                            SdgAvtO8Nv2ouVfA4ZcWVr9LNmubqS0CdytRPUk77DqT7yJNpTonk2ZOtTZ7TlnsxO5kPIIccH/x
                            oPM7+J2Ht6VbjCsUsmHWRu02KIGGEc1qPNbqu9Sz3n/0bdKV1NdFRgtjOJ51P75IWWdkNw3NxX7w
                            vG7ZiWORbFaWQ3Hjp24j8ZxR+MtXiSa3dFFeZc4uJcdSlZJJuUUUUVxcRVSOzx/1X5b9LcfxxVt6
                            qR2eP+q/Lfpbj+OKY0XypuiJg+B/RW3ooopchlXHt4fuVj31gv8ADNT3S2xZM9prjLrGby47S7TF
                            U20m3x1BtJaSQncp3O3n1qBdvD9yse+sF/hmnJpD8leJfUsT8FNMnuLaKO3MopxtA3qVjzsfyoQn
                            yc9mEBtW4/JsbnyP8NV/7CwIyzLwTuQwzuduv5xdWquH7PkfRK/tVVuwt+92YfQNfiLrtO8upZr9
                            3mpGbxP8FY7PMOx/NrIq1ZBCEhoK42nEnhcZX3KQocwfs8aRNu1Xy/HLzOxcSI90jW4FLMie2Vvl
                            I3AClIKQrbbqRv4miiqUwDoXB2diFSLNhutu5BVq9pTeLvls+aDFS4uPFhOBphpTaSoK4diVE9PX
                            Kth02604NNEBvTnGW077JtEUDf6FNFFSqyjsNL+itLky3el/2ib1dmGU2CJPXGg3KE43KShtBUtK
                            t0kbqSduR7qUumlwuWnkCXBxy4OoZlOh1307bbhKgNuR4aKKMpWtNLay2iA3SlEzUzM5EN1hV2Sk
                            OIKCpEdsKG4PMHh5GpJ2TrBEsNmv7cR6Q76aU2pZeUCd+E+AFFFcqGNbTOwi2iq8ARGyeFFFFJEE
                            iiiioootmun+I5g3tfrMxIe22TISOB5P/eOfuPKqha24TaMMyBcK0uzFtBew+ELSo/1CRRRXoNiS
                            PLi0nJMKBzibXS8ooor0qarcYbao95yBm3ylupaWrYlsgK+0EVcnANIMDxlpibFtAmTANxImq9Mp
                            J8QNuEHzAoopDtqR7WANNkBWuIbkUxwAOQ5AV9oorzCUooooqKIoooqKKGawXq52HD/h1pk/BpJk
                            Ib9JwJWQCDvyUCO7wqseLMS8bzKZltru0xF1lrcL7i0tKSv0iuJfqlGw3PhRRTvZzQYXZao2mHYK
                            t7jEp6djtumSFBTz8ZtbhA23JG55VsqKKSnUoM6qqGuTs7NL0/Z71cpBgwJjhjtMobQEnmnrw7nl
                            4mmV2db1dnkHHpc9cqDboKG4qXG0BSEpISkbpSN+XjRRTyoa3+GMkdIBuQt5rrkF4sdrgotE0xDK
                            UtDq0toWdth04gR31X7TZEzAblJn47dJTTk4JTIS6lpxKwDuOqNx1PSiipQtaaV2WqkAG6K//9k=" alt="Logo Kojo">
                </td>
                <td style="font-size: 16pt; padding-left: 20px">
                    <strong>CV. KOJO GROUP INDONESIA</strong> <br />
                            Komplek Perumahan Permata Biru,<br />
                            Jl. Permata III No.72, Cinunuk, Cileunyi, Bandung,<br />
                            Jawa Barat 40624 – 0813 2221 0723<br />
                </td>
            </tr>
        </table>
        
        <div style="padding: 10px 0">
            <hr style="border: 5px #b03cffff dashed" />
        </div>
        <div style="text-align: center">
            <h3 style="font-weight: bold; margin-bottom: 0px">INVOICE ORDER KOJO.CLOTH KONFEKSI</h3>
            <p style="margin-bottom: 10px; margin-top: 5px">NO: {{ $invoice->code }}</p>
        </div>
        <div>
            <table class="customer-information" style="width: 100%">
                <tbody>
                    <tr>
                        <th style="width: 20%">BARAYA KOJO</th>
                        <td>:</td>
                        <td style="width: 30%">{{ $invoice->name }}</td>
                        <th style="width: 20%">STATUS ORDER</th>
                        <td>:</td>
                        <td style="width: 20%">{{ $invoice->order_status }}</td>
                    </tr>
                    <tr>
                        <th style="width: 20%">INSTANSI</th>
                        <td>:</td>
                        <td style="width: 30%">{{ $invoice->institution }}</td>
                        <th style="width: 20%">TANGGAL MASUK</th>
                        <td>:</td>
                        <td style="width: 30%">{{ formatDate($invoice->enter_date) }}</td>
                    </tr>
                    <tr>
                        <th style="width: 20%">ALAMAT</th>
                        <td>:</td>
                        <td style="width: 30%">{{ $invoice->address }}</td>
                        <th style="width: 20%; padding-bottom: 0">TANGGAL KELUAR</th>
                        <td>:</td>
                        <td style="width: 30%">{{ formatDate($invoice->exit_date) }}</td>
                    </tr>
                    <tr>
                        <th style="width: 20%">NOMOR KONTAK</th>
                        <td>:</td>
                        <td style="width: 30%">{{ $invoice->phone_number }}</td>
                        <th style="width: 20%">METODE PEMBAYARAN</th>
                        <td>:</td>
                        <td rowspan="3" style="width: 30%">{{ $invoice->payment_method }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div style="padding: 10px 0">
            <table class="order" style="padding: 5px;" width="100%">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NAMA BARANG</th>
                        <th>BAHAN</th>
                        <th>JENIS LENGAN</th>
                        <th>UKURAN</th>
                        <th>JUMLAH</th>
                        <th>HARGA</th>
                        <th>TOTAL</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($invoice->detail as $detail)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $detail->type }}</td>
                            <td>{{ $detail->material }}</td>
                            <td>{{ $detail->sleeve }}</td>
                            <td>{{ $detail->size }}</td>
                            <td>{{ $detail->quantity }}</td>
                            <td>{{ formatIdr($detail->price) }}</td>
                            <td>{{ formatIdr($detail->price * $detail->quantity) }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="6"></td>
                        <td class="order-footer">JUMLAH</td>
                        <td class="order-footer">{{ formatIdr($invoice->price) }}</td>
                    </tr>
                    <tr>
                        <td colspan="6"></td>
                        <td class="order-footer">ONGKIR</td>
                        <td class="order-footer">{{ formatIdr($invoice->delivery_fee) }}</td>
                    </tr>
                    <tr>
                        <td colspan="6"></td>
                        <td class="order-footer">SISA</td>
                        <td class="order-footer">{{ formatIdr($invoice->remaining) }}</td>
                    </tr>
                    <tr>
                        <td colspan="7"></td>
                        <td class="order-footer" style="background-color: #d196faff;"><strong>{{ $invoice->is_paid_off == 1 ? 'LUNAS' : 'TIDAK' }}</strong></td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div style="text-align: right">
            <table width="100%">
                <tr>
                    <td style="width: 80%"></td>
                    <td style="width: 20%; text-align: center">
                        <strong>DIREKTUR</strong> <br />
                        <strong>CV KOJO GROUP INDONESIA</strong> <br />
                    </td>
                </tr>
                <tr>
                    <td style="width: 80%"></td>
                    <td style="width: 20%; text-align: center; padding: 10px 0;">
                        <img class="rotated" src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wBDAAUDBAQEAwUEBAQFBQUGBwwIBwcHBw8LCwkMEQ8SEhEP
                        ERETFhwXExQaFRERGCEYGh0dHx8fExciJCIeJBweHx7/2wBDAQUFBQcGBw4ICA4eFBEUHh4eHh4e
                        Hh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh7/wAARCABkAQADASIA
                        AhEBAxEB/8QAHQAAAgIDAQEBAAAAAAAAAAAAAAcGCAQFCQMBAv/EAEcQAAEDAwIDBAQJCgUEAwEA
                        AAECAwQABQYHERIhMQhBUWETInGBFDI3QnN1obKzFSMzNDU2YnKRsRYXQ1LBOIKS8GOi0dL/xAAa
                        AQACAwEBAAAAAAAAAAAAAAAEBQACAwEG/8QAMxEAAQMCAwUGBgIDAQAAAAAAAQACAwQREiExBRNB
                        UXEiYYGxwdEyM0KRofAU4TRS8VP/2gAMAwEAAhEDEQA/AHlk2iNguLkqYxkmW295wqcIYuqigKJ3
                        PqqB2G/cCKpPMybJmJbzKcju5CFqQCZjm52JHj5V0sl/qrv8h/tXL+6ftOV9Mv7xr0Ox5HS4w83t
                        ZMqJxffFmrj6U6PWq9YTZcgu2U5dJkT4bUhxtN0UhtJUkEgADfbn409oEVuFBYhs8ZbYaS2njUVK
                        ISABuTzJ5daiuiPyQ4n9Ux/uCpiSBz6Ck1TK98hDjoSgZXlzjdLvVXS6PnL6JrWSXuyT22g0hcOS
                        Q0QCSOJvlv1PMEVV274HqEnUo4PjmaycglIAVIejy3koiDfb88SSEkd4BJ5gdeVWFzLNb5m1+kYJ
                        pi8EFs+ju9/HNqEk9UNn5zhG4BB5Hp3kTnTnCLHgtiFrs7JK1njkyneb0lzvWtXeT4dBRkVTJSx2
                        dmeA5d59At2Suibn9lCdHdHpmHXBm9X/ADC7Xq5tpUEs/CFiMgqGx9VR3X1PM7eO1N+iil8sr5XY
                        nnNDPeXm5RRRRWaqioznmb45hNt+G3+4IZKgS0wn1nXSO5Kf+elRXXLViBp/b/gcQNy79IRuywfi
                        tJ/3r8vAd/20kLBgs3JmXtRtW769brQv84kunZ+SOoShPzUkdAASR0AHOmNLQh7RLMbN4cz0RMUA
                        cMb8h5rZZNrrneYXBVqwK0vQkK3CfQtF+SoeO4BCfcPfUUvenmbST+Uc8yS32haxxA3m58Tp9iE8
                        SvcBWVlGsKoUNdh01tbWM2hPql9tI+FPgcuJSufCT7SfPuqFWDE80zWYt+22q43RxxXryVglJJ6l
                        Tijtv7TvXoIYd024AjHfmfE8PymTGYBcANH5X25WHGIe6UZvHmLHX4NAeKT7CoJ3HuqOSm2m3ilh
                        8PIHRYSU7+48xTQRobkjCN7zfcYs570SrmkKH9AR9tfRoldZHq2zMMPuDnc21c0lR8hyNbtq4Rq+
                        /wC9wVxMwfUlfFkSIryXor7rDiTuFtqKVD2EHemZg+uud42421Jn/lqGk7KZnHiVt4Jc+MD4bkjy
                        qP5VpfnONMmRcsfkmMBuX4+zzYHiSgnYeZ2qHHqR0NauZBUtzs4K5DJRnmrxaXav4rnQRFZeNuup
                        HOFIUApR/gV0WPt8qY9c2GHXWHkPMuKbcQriStJIUkg7ggjmCD31Z3s/63quLsfFsxkj4WrZuHPX
                        /qnoEOd3F3BXeevPmfP1+yDGDJDmOSW1FHhGJmisVRRRSJAIqJZ/j2TXxEc45mcnHHGgoLDcVt5L
                        pO224Vz5eVS2irMcWG4XQbG4VG8x1U1bx3O7hiy85ekLhTDF9OIrSQv1gOLh4Tt16b1afT3F81tM
                        0Tsm1BkX9Cmin4L8BbZb4jt6249bceG9Uw1o+X3IvrpX3xXQhj9Aj+UU42lZkceEAYhnkO5G1Vmt
                        bYar0pMaya0jHL01hmGwU3vK5Kw0Gx6zcdSugVsRurv4dwB1JqTa+Zz/AIA04m3dhSfyg8fg0FJ5
                        /nVA+tt4JG6vcKSvYnxU3O6XnUG68UmQh0xozjnMlxQ4nV7/AO7ZSRv/ABGhKaBoidUSC4Gg5lYx
                        RjAZHaBMywaV3+9RkztTMzvV0mujiVAgy1RojBPzQEbcRHTfl7+tZ0/RiyNMleM37JMdnAbtyItz
                        dWAf4kLUQoeXKmjRWBqpb3Bt3cPss96++qrzB1Vy3TPMGsR1ZS3NgSDvCvrDfDxp323WkddtwDts
                        R377g1YCK+zLjNSozqHmHUBbbiFApWkjcEHwpa9pjDGcw0quQSylU+2oVNiL29YFA3WkeSkgjbx2
                        pZ9irUJ+bElYDdH/AEiorZkW5Sjz9HuAtv2AkEeRPlRL4mzwGdgsRqPVauYJI943Uaqy8v8AVXf5
                        D/auX90/acr6Zf3jXUCX+qu/yH+1cv7p+05X0y/vGjdh/X4eqIoPq8F0Q0XcQ1o5izjq0obRaGFK
                        Uo7BICAeflS1yDUP/NXOjpphl/btlsCFKuNzSrZ6UhO3E1H/AKn1u8AnoOcZsUHULVLRyFYrBxWD
                        H7fakMh14bOXZ9CAChO23C1uCN+/v35gVphyLxi2SNyGFP2+622RyJBStpxB2IIPmCCDyI3FSmoW
                        ve9xd2hew5ciVyKnDnON810hw/GbLiViYstihIiQ2RySkeso96lHqpR8TW6pf6G6jwNR8OauTZQ1
                        c44DVwjA/o3NuoH+1XUH3d1MCksrXteQ/VAvDg4h2qKKKKzVUVD9Wc1h4Hh8m9SOFcg/m4jBP6V0
                        jkPYOZPkKmFVF1xu0vUrWuHh1seKokSQITW3NIcJ/OuHx22I9ifOjaCmE8va+EZnot6eISPz0Gq8
                        dMbGxeXbnq7qS+p21RXS4hDg/XHx0SB3pB2AHQnYdAahmoma5DqZlTZLTqmi56K325kEpbBOwAA6
                        qPLc7c/IACt72gMojSLnFwawKLWP46kRm0pPJ55I2Ws+JB3APjue+tpYExtI8CYyeUw27mV8aP5M
                        acSD8BYI5vEH5xB7/EDpuK9Iw4bTEdo5NHIf8zJ8EzGXbIzOg5LzaxnDdL4bU3Om0X/JnEBxmxtL
                        Hoo+43BeUNwe7lzHkRzEXy/VnM8iQYouJtVtA4UQbcPQNJT3J9Xmoe0keQqFT5cq4TXps19yRIeW
                        VuuuKKlKUTuSSeprxoplML45O078DoOC2bEL3dmV9Wtbiyta1KUepUeZ9pNfASDvvRRRS1UoxLUD
                        MMWdSqzX2W00DuWFrLjSvIoVuPeAD51PY9xwLVXaHeIkbEssc2DU5gcMSWs9zifmknv+09KTVAJB
                        3B22oeSmY44m5O5j9z8Vm6IE3GRW5zPGLziV9es18iKjyGzuk9UuJJ5LSehSfH3HYgitMCUkFJII
                        PIg7GnNgd1jan4x/l7kzyfy1GbKrBcXPjcSRuWFqPMggbc9+Q8QN1DcoUm23CRb5rSmZMZ1TbqFD
                        YpUkkEH3ipBK5xLH/EPz3hSN5PZdqFbfsx6lryyxnHbw/wAV4tyBwOKO6pDI5BR/iT0PtB8adVc8
                        cEyOZieWW+/wlEORXgpSQdgtB5KSfIpJHvroFZ58a62qJc4aw5HlspeaV4pUNx/evMbXoxBLjbo7
                        zSqsh3b8Q0KzKKKKUoNc89aPl9yL66V98V0IY/QI/lFc99aPl9yL66V98V0IY/QI/lFOdqfLh6ey
                        Nq/hZ09lUbt13xx/K7FjyF/mYsRUpaQfnuKKRv7Aj7acPZGhoh6GWdSQAqS6++s+JLihv/RI/pVc
                        e2Q6t3W6YlROzcOOlPs4Sf7k1Zrsr/IVjv8AI7+Kur1bcGz4wO71VphhpmhNCiiikaAXlKZRIjOx
                        1gFDiChXsI2rnjpXdF4prZaJbay2iPdfg7gB23QpZbUD5cKjXROuZF8dUzmc55BIU3cXFJI7iHCR
                        /anexm4hI08QPVH0QuHBdMpf6q7/ACH+1cv7p+05X0y/vGuoEv8AVXf5D/auX90/acr6Zf3jV9h/
                        X4eqtQfV4Lonoh8kOJ/VUf7gpL9r/Sb4fGc1Ax+NvKYSPyoyhP6RsDk6AO9I5K8Rse6nRoj8kOJ/
                        VMf7gqXOtoeaU04hK0LBCkqG4I8DS1tQ6nqS9vNCNkMchcFzl0izy56eZjHvkAqcYJDcyNxbJfaJ
                        HEk+Y6g9xA7t66EYpfrZk+Pw77Z5CX4UtsLbUOo8UnwIPIjxqlXad0qXgWTG7WphX+HrksqZIB2j
                        OHmWifDvT4jcdxrJ7LmrCsIyAWC9Pn/D9xcAKlHlFdPIOfynlxe491OK2nbWRCeLXz/sI2eMTs3j
                        NVeKivy2tK0JWhQUlQ3BB3Br9V5tLFpM5vCcew673pRAMOI46nfvUEnhHvOwqnmjc82hOW5y+ril
                        W23qTGWrmfhMhXAlXPvHrk++rF9qaWqJozdAgkGQ6yz7QXAT9gqp8aZ8H0xmQ0HZUy7NFe3VSG2l
                        HY+QKwa9FsmEOpnH/YgeGV/VMqNl4z3lZ+jGOoy3UmBDnEqiNqVLmqUeRbb9ZW58Cdhv51h6rZS7
                        mGc3G8qJEcuFqI2OjbKCQgAdByG527yaluiyjbNP9RMib5Ps2xEJtQ6p9MogkHuPIH3ClTTiMY53
                        OP02A8z6I1uchPLJFekSO/LktxorLj77ighDaElSlEnYAAcyT4V50xeznfLJj+qMKdfltsxy0tpt
                        9weqy4oAJUfAbbjfu3reZ5jjLgLkDRXe4taSAolkWL5HjoaVfbJPtyXv0ZkMqQFeQJGxPl1rEslo
                        ul7nJgWe3yZ8lQJDTDZWogdTsByHnVqe1Hl2JyNNHrS1coNwnynW1RW2HUuFHCoErPCTwjh3G/fv
                        UE7IOS45ZbneYN3lRoUyYlsx331BKVJTxcSAo9DuQdu/3UvjrpXUpmLMxwQ7ah5iL8OaSd9s12sU
                        4wbzbpVvlAblp9soVsehAI5jzFYFWB7X+TY3eZFmt1qlxp0+IXFPvMLCwhCgAEFQ79wTsDy259ar
                        9RdJM6aFr3CxK2heXsDiLL3t0uRb58edDdUzIjuJcaWk7FKkkEEewgUz9fI8a9RMe1GgNpbbv8Xh
                        mJSOSZTYCV/1+3hJ8aVNNa1H8rdmW7x1+sqy3pt9sn5qXUhJA8tyT765Udl7JBzt4H+7LkmRa7w+
                        /wDaVNXJ7Jt9VdtK0QXnON61yVx+vPgPrp+8R7qptVjuxLNUJuS28n1S2w8keYKkk/aKF2xGH0pP
                        Kx9FlWtvETyVm6KxrhNh26G5Mny2IkZsbreecCEJHmTyFedoultu8JM21T4s+Ko7JejupcQT4bpJ
                        G9eOsbXSWxVANaPl9yL66V98V0IY/QI/lFc9tZfX1+yHbmTe1D38YFdCmRsygHrwjenO1Plw9PZG
                        1fws6eypR22beqLq6zM2IRMtrS0+1KlJP9hViOyqoL0Kx4pO+yXgfb6VdQvtt4i5dcKgZTFaK3bO
                        6W3wB/ouEDf2BQT7OI1l9iS/NXDS+TZCsGRa5q/V7/Ruesk/+XGPdUmfvdnNI+k5rrziphbgn3RR
                        RSZAoPIVzVjQjedTm7e0CozLwG0gDqFPbf2NdDc+vTGOYVeb5IWEohQ3HRudt1BJ4UjzKth76px2
                        RMUeybVlu+SEFUSzAy3FEci8rcNp9u+6v+2nWy3bqKWU8EdSHAxzyrvy/wBVd/kP9q5f3T9pyvpl
                        /eNXwyDRiJfZLz1wzjM1peWpRaFy2bSCSeEJ4eg322qMnsrYASSbnfiT1/Po/wD4rmz6mClxYnXv
                        bgpTSxxXudUydEfkhxP6pj/cFTKk9ZtBbTZkpRas1zOEhAAShm5cKQP5Qnb7KbMBgxYTEZTzr5Zb
                        Sguuq3WsgbcSj3k9aW1GAvLmOvfushZMN7grWZtjNry/GZmP3hkOxJSOE+KFfNWnwUDzFc8tTcMu
                        mBZfLx66J3U0eJh4AhL7RJ4Vp/pzHcQR3V0AzvEjlbEdn/EV8s6WeIq/Jsn0Jc32+Mdjvtt9tLW5
                        9mnELq+JFzyLJ5roGwXImJcVt4bqSaP2dWMpr43ZHhZEU0zYtSo32Q9WvynEawHIZO82Og/kx9Z5
                        utgblok/OSOniOXcN7LUhWey3gbDqXmbtkDbiCFJWiQgKSR3g8FMrT3BkYcX0s5Jf7q06hKUt3KX
                        6ZLe2/NPIEE7/ZQ9YaeR5fEdeFlnOY3EuYVEu1s2pejshSRuETWFK9nER/yKpuXnDGEcq/NpWXAP
                        4iACf6AVenX21KvGkeQRW0lTjcb4QkDv9GQs/Yk1RKnuw3A05HIo+gN4yO9NTTMen0O1Hjo5rSIb
                        xA68KVq3NKuml2cZDMrI7xiUpYSxkNqeiJJPIOhJUg+0et9lLOfFegzn4Ulstvx3VNuJI2KVJJBB
                        9mxphD2ZpG9D+LeiIZk9w8V41uMLxq65bkUaxWZkOSn9zuo7JQkDcqUe4AdfcBuSK09TLRzNBgec
                        R767GMmN6NTMhtJ2VwK23KT4ggEA9diOW+9azF4jJYLm2Su8uDTh1W51P0YyfA7Mi8S5EOfB4kod
                        cjFW7Kj04goDkTyBHf12rS6Xad33UK6PxLQWGWo6Qp+S+SEN77gDkCSTsdgB3HfamlrrrfYsswtz
                        HMdiTD8LUhUh6SgICEpUFcKQCdySBv3AeNRTs76oQdPp1wjXiK+7bp/AorYSFLbWncDkSNwQSOvL
                        YUBHLWGlLnN7fD/iHa+YwkkdpRrVPTi/aeT48e7FiQxJSSxJYJKFkbbgggbEbj+vLeoZTc7ROqdv
                        1Bft8GzRX2rfBKnPSvpCVuLUAOQ3OwAHtPltSjoukdK6IGYWctoS8sBfqimrhH5js7Z085yTImxG
                        Ub95Cwo7ee1KqmzmaDjPZ/xmwOepMvkxd1fQeRDYHC3uPAgpI9hrlVngZzI/GfopLnYd490pqsH2
                        J0KOSZE5t6qYbST7Ssn/AINV8q03YstSmcbvt5UnYSZSGEHxDaST9q6w2s4NpHX4281nWG0JWP26
                        nbijBLI3HLgguTyJPD8UqCCUBX/2I8xX3sPWqVCwK7Xt+4FUOZL4G4xPqtFtPrL37iriA/7RT0ym
                        wWjJ7JIst9hNzYMgbLbX49xBHMEeIpX2/QWFaLdOtFgznKLXaJ5JkQmnWylQI2IBKdxuNgSOo671
                        52OpjdS7hxsb8ktbK0xbs5Ks1lguahdo5QgJLzE2+rkrUByDCXSpSj5cI+0Vf+oNphpbiOnjDosM
                        NZlPAB6XIXxvLHhv0SPIAVOazrqps7gGaAWVaiYSEYdAsS6QYl0tsm3T2EPxZLSmnmlDcLQobEH3
                        VUyPar32ctV/yqpmROwy5K9A5IQknZsndIVt0cR5/GG+3U7W+rFuUGHcoTsK4RWJcZ1PC4y8gLQo
                        eBB5GsqapMN2kXadQqRS4Lg5grwsN3tl9tTF0tE1mbCfTxNvNK4kkf8A75d1bBRCQSSAB30rxotY
                        rbNdl4ffb/iinVcS2rdL/MKP0awof+91fZ+ksi8NmPkmoeW3WIr48b4Q2w2seCg2kEj31wxwk3D8
                        umft+VzCzgUsO0Rmc7Um8R9LNO0KunE8F3KQwd290nkkqHLgSealb9dgKc+jGn8DTnDGbJGUl6Us
                        +mmyQNi86Rz28EgcgPD2mtzhuH43h9u+A43aI1vaPxyhO63PNSzupR9prf1eapBjEMYs0fcnmVZ8
                        t2hjdFFNSM8sGBWhM+9PrU48r0cWIyOJ6Sv/AGoT7xz6CsKzzdRr1ERPcg2THW3RxNxZSXJT4B5j
                        j4VISk+Q32pDYjdDqb2u1ypyvT26yemMJlXNKUsnhSoDxK1cXt28BVsa7PEKcNbbtEXPsuyMEYA4
                        pU6n6j5Lp1i0m5XrGWbgobIjS4Lx+DlxR2HpUq2W37uIHpuDTDxic7dMbtlyeShLsuI0+tKPigrQ
                        FEDy51hah43Gy/CrrjkrhCZsdTaFEfEX1Qr3KAPurNxiC7a8atlteUhTsSG0w4U/FKkICTt5cqxe
                        6N0YsLOuqEtLdM1ptRb7kGN2SXerVZ4FxiQorsmUHpimXAEJKjwjgUDyHiKhWjOq2RamIfl2/F4E
                        OBFfS1JceuCuMb8/VSG+Z28wPOp1q18leW/Usz8BdJbsH/ubkX1g3+HREUbDSveW5gjnxWjGt3Rc
                        RmFZCiiigUOvKUw1Ijux3khTbqChYPeCNiK586h48/iuaXSwvpIMV8pbJG3E2TuhQ9qSDXQuq/dr
                        jAV3O1NZpbGCqTBR6OclI5qZ35L27+Enn5HypvsepEM2B2jvPgjKKXA/CeKrFZblLs93iXWC4W5U
                        R5LzSgeikkEe7lzHhTN1utEW/QIWqWPNb267AIuLaBv8FlgAKCtu5R5795594pT1ONKc6/wpKk22
                        6xBcscuafRXGCrmCk8uNA7lDu6b9NwdiPSzscCJWajhzHL2TSRpuHN1Cg9FMfUPTRUCCMpw6Qb7i
                        z/rofa9ZyNv1Q6nqCOm5Ht2pcVrFK2VuJpV2PDxcIooorRWRRRUu060+vuaS1GI2mJbGecq4yPUY
                        YT1JKjsCQO4Hfx2HOqPkbG3E42Cq5waLle2j+GnL8oSJavQWWAn4Tc5KuSG2k8yCe4q2I9m57q/W
                        quQyM6y+5XqEwpNrgNpZjJ+azHSoJR7OInfbzPhUsyS7xpsaNpNpVHdkQ3XQJs0DZy4Og81E9zY2
                        33PLYDuHPV6tx7Vhllh6eWl5Ema2sS73LR/qP8JCGh/CgEnbz3PPegWSF8wcRmdByHEnr+8VgHEv
                        BPh05pZISpa0oQkqUogAAbkk8gBV99HMaOJacWizOICZCWfSyBt/qrPEoe4nb3VWfsvYCvKMxTfZ
                        zHFabSsOEqHJ18c0IHiB8Y+wA9auTSrblSHOELeGZQlfLchgRUY1Qyg4Xgd0ydMMTDAbSv0BXwce
                        60p67Hb41SeorqxjD2Zaf3TGY8hEdycltHpVgkJAcSonl37JPvpHFhxtx6XzQDLYhfRaLAsvzfL8
                        Tg5HDxizQ401JWy3KuTiXCniICtkskbHbceW1RXDNab/AJVqHcsIg4tbWZ9vU8l1164rDSi0vgVw
                        kNknc9OQ5eFOWzW6NabTEtcJAbjRGUstJ8EpAAH2VVTs8f8AVflv0tx/HFHQNilbK7DoLjX3W7Ax
                        webaJraraqZTpy3bHr1idulR57xZS5DuK1BChtyVxNJ5kE7dehpusOelYbc2240hW3tqH6yYUjPc
                        IfsQcaZkh5t+K64CUocQrfc7c9iOIe+phGQWo7bZO5SgJPuFCyOjMbcIs7O/osnFpaLDNKPWfVXI
                        tM0My5+LwJkCU+pmO41cVcZ2G/rJLfI7eBI86menN+yHJLJEvV1s8C3Q5sVuRGDMxTzhCwFDiHAA
                        OR8TSe7eH7lY99YL/DNOTSH5K8S+pYn4Ka3kjYKVkgbmSVo5rd0HWzKz8rl5BChh+w22DPWkEuok
                        ylM8hz9UhCt/ftSo0o1pyPUe7TrfZcRt7CoKUrfXJuSkpAUSBtwtknoadVw/Z8j6JX9qqt2Fv3uz
                        D6Br8RdSnjY6nke5ty235Uia0xuJGijnY1Do10uCXt/SC3SQvfrv6Vvf/mrqVVG0Ws6V9rZLk5Po
                        LPf1PCI+eSPzx3Cd+gIcATt5g99WurTabg+Rsg0ICtVHE4OHEIoqMaoZM1iGA3jIXCAuJGUpkH5z
                        p5IHvURWTp/Nk3LA8fuM10uypNsjPPOEAca1NJUo7DxJNAYDgx8L2Q+E4cSxtWvkry36lmfgLpLd
                        g/8Ac3IvrBv8OnTq18leW/Usz8BdJbsH/ubkX1g3+HRsP+FJ1C3Z8h3UKyFFFLTSDOH80yfNiiQH
                        LZbbi3FggJGwSlBClA7c+JQJ5k9RtQTYy5pcNAsA0kE8ky68pDTT7DjDzaXGnElK0KG4UDyIPlXr
                        RVFVUx7QWk8nCrq5eLQyt3HpK90kczFUfmK8t/inw5d3NSV0gnw4s+E9Cmx25EZ5JQ404kKSpJ6g
                        g1WHWDs+ToLr13wZCpcM7rXb1Hd1rx4D88eR5jzr0+ztrNcBHMbHnzTWmrARhfqk/g2a5Hhk8y7F
                        PUyle3pmFjiadHgtB5Hly35EdxFTlzI9JszJXk2Py8Wui+a5tpIUwtR+cpsjl47AE+dKiVHkRX1x
                        5LLjDzZ4VtuJKVJI6gg7EH21502fTsecYyPMfuaMdG1xvoU1Tplhk717Lq1YFIPxUTkKjr94J3+y
                        gaU49H9e56sYmy31PoFqdV/4ggmlVRVdzL/6H7D2XMD/APbyTaR/kpif530l1zacnmlBT8Gi7jx6
                        KI/qD4ViXDKc31SmN4zZYjNvtDY3TAhJDUZhA+c6rkNh15nbfoN6WFZTVxntQV29mW+3FcVutlCy
                        ErPcVAddu7ffap/FA7V7u5nO3houbrjqe9ORzKcW0lsL9nwuQxesrko4Jl4SN2o+/VLXjt3bctxu
                        SdgAvtO8Nv2ouVfA4ZcWVr9LNmubqS0CdytRPUk77DqT7yJNpTonk2ZOtTZ7TlnsxO5kPIIccH/x
                        oPM7+J2Ht6VbjCsUsmHWRu02KIGGEc1qPNbqu9Sz3n/0bdKV1NdFRgtjOJ51P75IWWdkNw3NxX7w
                        vG7ZiWORbFaWQ3Hjp24j8ZxR+MtXiSa3dFFeZc4uJcdSlZJJuUUUUVxcRVSOzx/1X5b9LcfxxVt6
                        qR2eP+q/Lfpbj+OKY0XypuiJg+B/RW3ooopchlXHt4fuVj31gv8ADNT3S2xZM9prjLrGby47S7TF
                        U20m3x1BtJaSQncp3O3n1qBdvD9yse+sF/hmnJpD8leJfUsT8FNMnuLaKO3MopxtA3qVjzsfyoQn
                        yc9mEBtW4/JsbnyP8NV/7CwIyzLwTuQwzuduv5xdWquH7PkfRK/tVVuwt+92YfQNfiLrtO8upZr9
                        3mpGbxP8FY7PMOx/NrIq1ZBCEhoK42nEnhcZX3KQocwfs8aRNu1Xy/HLzOxcSI90jW4FLMie2Vvl
                        I3AClIKQrbbqRv4miiqUwDoXB2diFSLNhutu5BVq9pTeLvls+aDFS4uPFhOBphpTaSoK4diVE9PX
                        Kth02604NNEBvTnGW077JtEUDf6FNFFSqyjsNL+itLky3el/2ib1dmGU2CJPXGg3KE43KShtBUtK
                        t0kbqSduR7qUumlwuWnkCXBxy4OoZlOh1307bbhKgNuR4aKKMpWtNLay2iA3SlEzUzM5EN1hV2Sk
                        OIKCpEdsKG4PMHh5GpJ2TrBEsNmv7cR6Q76aU2pZeUCd+E+AFFFcqGNbTOwi2iq8ARGyeFFFFJEE
                        iiiioootmun+I5g3tfrMxIe22TISOB5P/eOfuPKqha24TaMMyBcK0uzFtBew+ELSo/1CRRRXoNiS
                        PLi0nJMKBzibXS8ooor0qarcYbao95yBm3ylupaWrYlsgK+0EVcnANIMDxlpibFtAmTANxImq9Mp
                        J8QNuEHzAoopDtqR7WANNkBWuIbkUxwAOQ5AV9oorzCUooooqKIoooqKKGawXq52HD/h1pk/BpJk
                        Ib9JwJWQCDvyUCO7wqseLMS8bzKZltru0xF1lrcL7i0tKSv0iuJfqlGw3PhRRTvZzQYXZao2mHYK
                        t7jEp6djtumSFBTz8ZtbhA23JG55VsqKKSnUoM6qqGuTs7NL0/Z71cpBgwJjhjtMobQEnmnrw7nl
                        4mmV2db1dnkHHpc9cqDboKG4qXG0BSEpISkbpSN+XjRRTyoa3+GMkdIBuQt5rrkF4sdrgotE0xDK
                        UtDq0toWdth04gR31X7TZEzAblJn47dJTTk4JTIS6lpxKwDuOqNx1PSiipQtaaV2WqkAG6K//9k=" alt="">
                    </td>
                </tr>
                <tr>
                    <td style="width: 80%"></td>
                    <td style="width: 20%; text-align: center; padding: 10px 0">
                        <strong>FAIZAL NURSODIK</strong> <br />
                    </td>
                </tr>
            </table>
        </div>
        <div>
            <p>
                Ket: <br />
                <em>Untuk pembayaran DP minimal 50% dan dapat dikirim ke salah satu rekening dibawah ini,</em>
            </p>
            <p>
                <strong>Bank BCA</strong>
            </p>
            <p style="color: grey;">
                0153968273 a.n Muhammad Imam Almizan
            </p>
        </div>
    </div>
</body>
</html>