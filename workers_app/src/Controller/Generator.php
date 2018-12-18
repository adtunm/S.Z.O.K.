<?php
/**
 * Created by PhpStorm.
 * User: gnowa
 * Date: 01.12.2018
 * Time: 18:32
 */

namespace App\Controller;

use App\Entity\Bilety;
use App\Entity\Filmy;
use App\Entity\Miejsca;
use App\Entity\Pracownicy;
use App\Entity\Promocje;
use App\Entity\Pulebiletow;
use App\Entity\Rezerwacje;
use App\Entity\Rodzajeplatnosci;
use App\Entity\Sale;
use App\Entity\Seanse;
use App\Entity\SeansMaFilmy;
use App\Entity\Tranzakcje;
use App\Entity\Uzytkownicy;
use App\Entity\Vouchery;
use App\Entity\Wydarzeniaspecjalne;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\DateTime;

class Generator extends AbstractController
{
    private $startGeneration = '2018-11-01'; //from when to start generate
    private $endGeneration = '2019-02-01'; //where to end, this day won't be included
    private $percentageOfNonEmptySeances = 0.97; //how many seances need to have transaction and booking from 0.5 to 1

    private $revLayout = array(
        1 => array(
            21, 22, 23, 24, 25, 26, 27, 28, 29, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48,
            49, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 72, 73, 74, 75, 76, 77, 78,
            79, 80, 101, 102, 103, 104, 105, 106, 107, 108, 109, 112, 113, 114, 115, 116, 117, 118, 119, 120, 121, 122,
            123, 124, 125, 126, 127, 128, 129, 132, 133, 134, 135, 136, 137, 138, 139, 140, 141, 142, 143, 144, 145,
            146, 147, 148, 149, 152, 153, 154, 155, 156, 157, 158, 159, 160, 221, 222, 223, 224, 225, 226, 227, 228,
            229, 232, 233, 234, 235, 236, 237, 238, 239, 240, 241, 242, 243, 244, 245, 246, 247, 248, 249, 252, 253,
            254, 255, 256, 257, 258, 259, 260, 261, 262, 263, 264, 265, 266, 267, 268, 269, 272, 273, 274, 275, 276,
            277, 278, 279, 280, 281, 282, 283, 284, 285, 286, 287, 288, 289, 292, 293, 294, 295, 296, 297, 298, 299,
            300, 301, 302, 303, 304, 305, 306, 307, 308, 309, 312, 313, 314, 315, 316, 317, 318, 319, 320
        ),
        2 => array(
            381, 382, 383, 384, 385, 386, 387, 388, 389, 392, 393, 394, 395, 396, 397, 398, 399, 400, 421, 422, 423,
            424, 425, 426, 427, 428, 429, 432, 433, 434, 435, 436, 437, 438, 439, 440, 441, 442, 443, 444, 445, 446,
            447, 448, 449, 452, 453, 454, 455, 456, 457, 458, 459, 460, 501, 502, 503, 504, 505, 506, 507, 508, 509,
            512, 513, 514, 515, 516, 517, 518, 519, 520, 621, 622, 623, 624, 625, 626, 627, 628, 629, 632, 633, 634,
            635, 636, 637, 638, 639, 640
        ),
        3 => array(
            641, 642, 643, 644, 645, 646, 647, 648, 649, 652, 653, 654, 655, 656, 657, 658, 659, 660, 661, 662, 663,
            664, 665, 666, 667, 668, 669, 672, 673, 674, 675, 676, 677, 678, 679, 680, 741, 742, 743, 744, 745, 746,
            747, 748, 749, 752, 753, 754, 755, 756, 757, 758, 759, 760, 781, 782, 783, 784, 785, 786, 787, 788, 789,
            792, 793, 794, 795, 796, 797, 798, 799, 800, 921, 922, 923, 924, 925, 926, 927, 928, 929, 932, 933, 934,
            935, 936, 937, 938, 939, 940
        ),
        4 => array(
            961, 962, 963, 964, 965, 966, 967, 968, 969, 972, 973, 974, 975, 976, 977, 978, 979, 980, 981, 982, 983,
            984, 985, 986, 987, 988, 989, 992, 993, 994, 995, 996, 997, 998, 999, 1000, 1021, 1022, 1023, 1024, 1025,
            1026, 1027, 1028, 1029, 1032, 1033, 1034, 1035, 1036, 1037, 1038, 1039, 1040, 1041, 1042, 1043, 1044, 1045,
            1046, 1047, 1048, 1049, 1052, 1053, 1054, 1055, 1056, 1057, 1058, 1059, 1060, 1101, 1102, 1103, 1104, 1105,
            1106, 1107, 1108, 1109, 1112, 1113, 1114, 1115, 1116, 1117, 1118, 1119, 1120, 1141, 1142, 1143, 1144, 1145,
            1146, 1147, 1148, 1149, 1152, 1153, 1154, 1155, 1156, 1157, 1158, 1159, 1160, 1161, 1162, 1163, 1164, 1165,
            1166, 1167, 1168, 1169, 1172, 1173, 1174, 1175, 1176, 1177, 1178, 1179, 1180, 1181, 1182, 1183, 1184, 1185,
            1186, 1187, 1188, 1189, 1192, 1193, 1194, 1195, 1196, 1197, 1198, 1199, 1200, 1241, 1242, 1243, 1244, 1245,
            1246, 1247, 1248, 1249, 1252, 1253, 1254, 1255, 1256, 1257, 1258, 1259, 1260, 1261, 1262, 1263, 1264, 1265,
            1266, 1267, 1268, 1269, 1272, 1273, 1274, 1275, 1276, 1277, 1278, 1279, 1280
        ),
        5 => array(
            1301, 1302, 1303, 1304, 1305, 1306, 1307, 1308, 1309, 1312, 1313, 1314, 1315, 1316, 1317, 1318, 1319, 1320,
            1321, 1322, 1323, 1324, 1325, 1326, 1327, 1328, 1329, 1332, 1333, 1334, 1335, 1336, 1337, 1338, 1339, 1340,
            1381, 1382, 1383, 1384, 1385, 1386, 1387, 1388, 1389, 1392, 1393, 1394, 1395, 1396, 1397, 1398, 1399, 1400,
            1421, 1422, 1423, 1424, 1425, 1426, 1427, 1428, 1429, 1432, 1433, 1434, 1435, 1436, 1437, 1438, 1439, 1440,
            1441, 1442, 1443, 1444, 1445, 1446, 1447, 1448, 1449, 1452, 1453, 1454, 1455, 1456, 1457, 1458, 1459, 1460,
            1501, 1502, 1503, 1504, 1505, 1506, 1507, 1508, 1509, 1512, 1513, 1514, 1515, 1516, 1517, 1518, 1519, 1520,
            1521, 1522, 1523, 1524, 1525, 1526, 1527, 1528, 1529, 1532, 1533, 1534, 1535, 1536, 1537, 1538, 1539, 1540,
            1541, 1542, 1543, 1544, 1545, 1546, 1547, 1548, 1549, 1552, 1553, 1554, 1555, 1556, 1557, 1558, 1559, 1560,
            1561, 1562, 1563, 1564, 1565, 1566, 1567, 1568, 1569, 1572, 1573, 1574, 1575, 1576, 1577, 1578, 1579, 1580
        ),
        6 => array(
            1601, 1602, 1603, 1604, 1605, 1606, 1607, 1608, 1609, 1612, 1613, 1614, 1615, 1616, 1617, 1618, 1619, 1620,
            1701, 1702, 1703, 1704, 1705, 1706, 1707, 1708, 1709, 1712, 1713, 1714, 1715, 1716, 1717, 1718, 1719, 1720,
            1721, 1722, 1723, 1724, 1725, 1726, 1727, 1728, 1729, 1732, 1733, 1734, 1735, 1736, 1737, 1738, 1739, 1740,
            1741, 1742, 1743, 1744, 1745, 1746, 1747, 1748, 1749, 1752, 1753, 1754, 1755, 1756, 1757, 1758, 1759, 1760,
            1821, 1822, 1823, 1824, 1825, 1826, 1827, 1828, 1829, 1832, 1833, 1834, 1835, 1836, 1837, 1838, 1839, 1840,
            1841, 1842, 1843, 1844, 1845, 1846, 1847, 1848, 1849, 1852, 1853, 1854, 1855, 1856, 1857, 1858, 1859, 1860,
            1861, 1862, 1863, 1864, 1865, 1866, 1867, 1868, 1869, 1872, 1873, 1874, 1875, 1876, 1877, 1878, 1879, 1880
        )
    );
    private $transLayout = array(
        1 => array(
            1, 2, 3, 4, 5, 6, 7, 8, 9, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 32, 33,
            34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62,
            63, 64, 65, 66, 67, 68, 69, 72, 73, 74, 75, 76, 77, 78, 79, 80, 81, 82, 83, 84, 85, 86, 87, 88, 89, 92, 93,
            94, 95, 96, 97, 98, 99, 100, 101, 102, 103, 104, 105, 106, 107, 108, 109, 112, 113, 114, 115, 116, 117, 118,
            119, 120, 121, 122, 123, 124, 125, 126, 127, 128, 129, 132, 133, 134, 135, 136, 137, 138, 139, 140, 141,
            142, 143, 144, 145, 146, 147, 148, 149, 152, 153, 154, 155, 156, 157, 158, 159, 160, 161, 162, 163, 164,
            165, 166, 167, 168, 169, 172, 173, 174, 175, 176, 177, 178, 179, 180, 181, 182, 183, 184, 185, 186, 187,
            188, 189, 192, 193, 194, 195, 196, 197, 198, 199, 200, 201, 202, 203, 204, 205, 206, 207, 208, 209, 212,
            213, 214, 215, 216, 217, 218, 219, 220, 221, 222, 223, 224, 225, 226, 227, 228, 229, 232, 233, 234, 235,
            236, 237, 238, 239, 240, 241, 242, 243, 244, 245, 246, 247, 248, 249, 252, 253, 254, 255, 256, 257, 258,
            259, 260, 261, 262, 263, 264, 265, 266, 267, 268, 269, 272, 273, 274, 275, 276, 277, 278, 279, 280, 281,
            282, 283, 284, 285, 286, 287, 288, 289, 292, 293, 294, 295, 296, 297, 298, 299, 300, 301, 302, 303, 304,
            305, 306, 307, 308, 309, 312, 313, 314, 315, 316, 317, 318, 319, 320
        ),
        2 => array(
            321, 322, 323, 324, 325, 326, 327, 328, 329, 332, 333, 334, 335, 336, 337, 338, 339, 340, 341, 342, 343,
            344, 345, 346, 347, 348, 349, 352, 353, 354, 355, 356, 357, 358, 359, 360, 361, 362, 363, 364, 365, 366,
            367, 368, 369, 372, 373, 374, 375, 376, 377, 378, 379, 380, 381, 382, 383, 384, 385, 386, 387, 388, 389,
            392, 393, 394, 395, 396, 397, 398, 399, 400, 401, 402, 403, 404, 405, 406, 407, 408, 409, 412, 413, 414,
            415, 416, 417, 418, 419, 420, 421, 422, 423, 424, 425, 426, 427, 428, 429, 432, 433, 434, 435, 436, 437,
            438, 439, 440, 441, 442, 443, 444, 445, 446, 447, 448, 449, 452, 453, 454, 455, 456, 457, 458, 459, 460,
            461, 462, 463, 464, 465, 466, 467, 468, 469, 472, 473, 474, 475, 476, 477, 478, 479, 480, 481, 482, 483,
            484, 485, 486, 487, 488, 489, 492, 493, 494, 495, 496, 497, 498, 499, 500, 501, 502, 503, 504, 505, 506,
            507, 508, 509, 512, 513, 514, 515, 516, 517, 518, 519, 520, 521, 522, 523, 524, 525, 526, 527, 528, 529,
            532, 533, 534, 535, 536, 537, 538, 539, 540, 541, 542, 543, 544, 545, 546, 547, 548, 549, 552, 553, 554,
            555, 556, 557, 558, 559, 560, 561, 562, 563, 564, 565, 566, 567, 568, 569, 572, 573, 574, 575, 576, 577,
            578, 579, 580, 581, 582, 583, 584, 585, 586, 587, 588, 589, 592, 593, 594, 595, 596, 597, 598, 599, 600,
            601, 602, 603, 604, 605, 606, 607, 608, 609, 612, 613, 614, 615, 616, 617, 618, 619, 620, 621, 622, 623,
            624, 625, 626, 627, 628, 629, 632, 633, 634, 635, 636, 637, 638, 639, 640
        ),
        3 => array(
            641, 642, 643, 644, 645, 646, 647, 648, 649, 652, 653, 654, 655, 656, 657, 658, 659, 660, 661, 662, 663,
            664, 665, 666, 667, 668, 669, 672, 673, 674, 675, 676, 677, 678, 679, 680, 681, 682, 683, 684, 685, 686,
            687, 688, 689, 692, 693, 694, 695, 696, 697, 698, 699, 700, 701, 702, 703, 704, 705, 706, 707, 708, 709,
            712, 713, 714, 715, 716, 717, 718, 719, 720, 721, 722, 723, 724, 725, 726, 727, 728, 729, 732, 733, 734,
            735, 736, 737, 738, 739, 740, 741, 742, 743, 744, 745, 746, 747, 748, 749, 752, 753, 754, 755, 756, 757,
            758, 759, 760, 761, 762, 763, 764, 765, 766, 767, 768, 769, 772, 773, 774, 775, 776, 777, 778, 779, 780,
            781, 782, 783, 784, 785, 786, 787, 788, 789, 792, 793, 794, 795, 796, 797, 798, 799, 800, 801, 802, 803,
            804, 805, 806, 807, 808, 809, 812, 813, 814, 815, 816, 817, 818, 819, 820, 821, 822, 823, 824, 825, 826,
            827, 828, 829, 832, 833, 834, 835, 836, 837, 838, 839, 840, 841, 842, 843, 844, 845, 846, 847, 848, 849,
            852, 853, 854, 855, 856, 857, 858, 859, 860, 861, 862, 863, 864, 865, 866, 867, 868, 869, 872, 873, 874,
            875, 876, 877, 878, 879, 880, 881, 882, 883, 884, 885, 886, 887, 888, 889, 892, 893, 894, 895, 896, 897,
            898, 899, 900, 901, 902, 903, 904, 905, 906, 907, 908, 909, 912, 913, 914, 915, 916, 917, 918, 919, 920,
            921, 922, 923, 924, 925, 926, 927, 928, 929, 932, 933, 934, 935, 936, 937, 938, 939, 940, 941, 942, 943,
            944, 945, 946, 947, 948, 949, 952, 953, 954, 955, 956, 957, 958, 959, 960
        ),
        4 => array(
            961, 962, 963, 964, 965, 966, 967, 968, 969, 972, 973, 974, 975, 976, 977, 978, 979, 980, 981, 982, 983,
            984, 985, 986, 987, 988, 989, 992, 993, 994, 995, 996, 997, 998, 999, 1000, 1001, 1002, 1003, 1004, 1005,
            1006, 1007, 1008, 1009, 1012, 1013, 1014, 1015, 1016, 1017, 1018, 1019, 1020, 1021, 1022, 1023, 1024, 1025,
            1026, 1027, 1028, 1029, 1032, 1033, 1034, 1035, 1036, 1037, 1038, 1039, 1040, 1041, 1042, 1043, 1044, 1045,
            1046, 1047, 1048, 1049, 1052, 1053, 1054, 1055, 1056, 1057, 1058, 1059, 1060, 1061, 1062, 1063, 1064, 1065,
            1066, 1067, 1068, 1069, 1072, 1073, 1074, 1075, 1076, 1077, 1078, 1079, 1080, 1081, 1082, 1083, 1084, 1085,
            1086, 1087, 1088, 1089, 1092, 1093, 1094, 1095, 1096, 1097, 1098, 1099, 1100, 1101, 1102, 1103, 1104, 1105,
            1106, 1107, 1108, 1109, 1112, 1113, 1114, 1115, 1116, 1117, 1118, 1119, 1120, 1121, 1122, 1123, 1124, 1125,
            1126, 1127, 1128, 1129, 1132, 1133, 1134, 1135, 1136, 1137, 1138, 1139, 1140, 1141, 1142, 1143, 1144, 1145,
            1146, 1147, 1148, 1149, 1152, 1153, 1154, 1155, 1156, 1157, 1158, 1159, 1160, 1161, 1162, 1163, 1164, 1165,
            1166, 1167, 1168, 1169, 1172, 1173, 1174, 1175, 1176, 1177, 1178, 1179, 1180, 1181, 1182, 1183, 1184, 1185,
            1186, 1187, 1188, 1189, 1192, 1193, 1194, 1195, 1196, 1197, 1198, 1199, 1200, 1201, 1202, 1203, 1204, 1205,
            1206, 1207, 1208, 1209, 1212, 1213, 1214, 1215, 1216, 1217, 1218, 1219, 1220, 1221, 1222, 1223, 1224, 1225,
            1226, 1227, 1228, 1229, 1232, 1233, 1234, 1235, 1236, 1237, 1238, 1239, 1240, 1241, 1242, 1243, 1244, 1245,
            1246, 1247, 1248, 1249, 1252, 1253, 1254, 1255, 1256, 1257, 1258, 1259, 1260, 1261, 1262, 1263, 1264, 1265,
            1266, 1267, 1268, 1269, 1272, 1273, 1274, 1275, 1276, 1277, 1278, 1279, 1280
        ),
        5 => array(
            1281, 1282, 1283, 1284, 1285, 1286, 1287, 1288, 1289, 1292, 1293, 1294, 1295, 1296, 1297, 1298, 1299, 1300,
            1301, 1302, 1303, 1304, 1305, 1306, 1307, 1308, 1309, 1312, 1313, 1314, 1315, 1316, 1317, 1318, 1319, 1320,
            1321, 1322, 1323, 1324, 1325, 1326, 1327, 1328, 1329, 1332, 1333, 1334, 1335, 1336, 1337, 1338, 1339, 1340,
            1341, 1342, 1343, 1344, 1345, 1346, 1347, 1348, 1349, 1352, 1353, 1354, 1355, 1356, 1357, 1358, 1359, 1360,
            1361, 1362, 1363, 1364, 1365, 1366, 1367, 1368, 1369, 1372, 1373, 1374, 1375, 1376, 1377, 1378, 1379, 1380,
            1381, 1382, 1383, 1384, 1385, 1386, 1387, 1388, 1389, 1392, 1393, 1394, 1395, 1396, 1397, 1398, 1399, 1400,
            1401, 1402, 1403, 1404, 1405, 1406, 1407, 1408, 1409, 1412, 1413, 1414, 1415, 1416, 1417, 1418, 1419, 1420,
            1421, 1422, 1423, 1424, 1425, 1426, 1427, 1428, 1429, 1432, 1433, 1434, 1435, 1436, 1437, 1438, 1439, 1440,
            1441, 1442, 1443, 1444, 1445, 1446, 1447, 1448, 1449, 1452, 1453, 1454, 1455, 1456, 1457, 1458, 1459, 1460,
            1461, 1462, 1463, 1464, 1465, 1466, 1467, 1468, 1469, 1472, 1473, 1474, 1475, 1476, 1477, 1478, 1479, 1480,
            1481, 1482, 1483, 1484, 1485, 1486, 1487, 1488, 1489, 1492, 1493, 1494, 1495, 1496, 1497, 1498, 1499, 1500,
            1501, 1502, 1503, 1504, 1505, 1506, 1507, 1508, 1509, 1512, 1513, 1514, 1515, 1516, 1517, 1518, 1519, 1520,
            1521, 1522, 1523, 1524, 1525, 1526, 1527, 1528, 1529, 1532, 1533, 1534, 1535, 1536, 1537, 1538, 1539, 1540,
            1541, 1542, 1543, 1544, 1545, 1546, 1547, 1548, 1549, 1552, 1553, 1554, 1555, 1556, 1557, 1558, 1559, 1560,
            1561, 1562, 1563, 1564, 1565, 1566, 1567, 1568, 1569, 1572, 1573, 1574, 1575, 1576, 1577, 1578, 1579, 1580,
            1581, 1582, 1583, 1584, 1585, 1586, 1587, 1588, 1589, 1592, 1593, 1594, 1595, 1596, 1597, 1598, 1599, 1600
        ),
        6 => array(
            1601, 1602, 1603, 1604, 1605, 1606, 1607, 1608, 1609, 1612, 1613, 1614, 1615, 1616, 1617, 1618, 1619, 1620,
            1621, 1622, 1623, 1624, 1625, 1626, 1627, 1628, 1629, 1632, 1633, 1634, 1635, 1636, 1637, 1638, 1639, 1640,
            1641, 1642, 1643, 1644, 1645, 1646, 1647, 1648, 1649, 1652, 1653, 1654, 1655, 1656, 1657, 1658, 1659, 1660,
            1661, 1662, 1663, 1664, 1665, 1666, 1667, 1668, 1669, 1672, 1673, 1674, 1675, 1676, 1677, 1678, 1679, 1680,
            1681, 1682, 1683, 1684, 1685, 1686, 1687, 1688, 1689, 1692, 1693, 1694, 1695, 1696, 1697, 1698, 1699, 1700,
            1701, 1702, 1703, 1704, 1705, 1706, 1707, 1708, 1709, 1712, 1713, 1714, 1715, 1716, 1717, 1718, 1719, 1720,
            1721, 1722, 1723, 1724, 1725, 1726, 1727, 1728, 1729, 1732, 1733, 1734, 1735, 1736, 1737, 1738, 1739, 1740,
            1741, 1742, 1743, 1744, 1745, 1746, 1747, 1748, 1749, 1752, 1753, 1754, 1755, 1756, 1757, 1758, 1759, 1760,
            1761, 1762, 1763, 1764, 1765, 1766, 1767, 1768, 1769, 1772, 1773, 1774, 1775, 1776, 1777, 1778, 1779, 1780,
            1781, 1782, 1783, 1784, 1785, 1786, 1787, 1788, 1789, 1792, 1793, 1794, 1795, 1796, 1797, 1798, 1799, 1800,
            1801, 1802, 1803, 1804, 1805, 1806, 1807, 1808, 1809, 1812, 1813, 1814, 1815, 1816, 1817, 1818, 1819, 1820,
            1821, 1822, 1823, 1824, 1825, 1826, 1827, 1828, 1829, 1832, 1833, 1834, 1835, 1836, 1837, 1838, 1839, 1840,
            1841, 1842, 1843, 1844, 1845, 1846, 1847, 1848, 1849, 1852, 1853, 1854, 1855, 1856, 1857, 1858, 1859, 1860,
            1861, 1862, 1863, 1864, 1865, 1866, 1867, 1868, 1869, 1872, 1873, 1874, 1875, 1876, 1877, 1878, 1879, 1880,
            1881, 1882, 1883, 1884, 1885, 1886, 1887, 1888, 1889, 1892, 1893, 1894, 1895, 1896, 1897, 1898, 1899, 1900,
            1901, 1902, 1903, 1904, 1905, 1906, 1907, 1908, 1909, 1912, 1913, 1914, 1915, 1916, 1917, 1918, 1919, 1920
        )
    );

    private $maleNames = array(
        'Jan', 'Stanisław', 'Andrzej', 'Józef', 'Tadeusz', 'Jerzy', 'Zbigniew', 'Krzysztof', 'Henryk', 'Ryszard',
        'Kazimierz', 'Marek', 'Marian', 'Piotr', 'Janusz', 'Władysław', 'Adam', 'Wiesław', 'Zdzisław', 'Edward',
        'Mieczysław', 'Roman', 'Mirosław', 'Grzegorz', 'Czesław', 'Dariusz', 'Wojciech', 'Jacek', 'Eugeniusz', 'Tomasz',
        'Stefan', 'Zygmunt', 'Leszek', 'Bogdan', 'Antoni', 'Paweł', 'Franciszek', 'Sławomir', 'Waldemar', 'Jarosław',
        'Robert', 'Mariusz', 'Włodzimierz', 'Michał', 'Zenon', 'Bogusław', 'Witold', 'Aleksander', 'Bronisław', 'Wacław',
        'Bolesław', 'Ireneusz', 'Maciej', 'Artur', 'Edmund', 'Marcin', 'Lech', 'Karol', 'Rafał', 'Arkadiusz',
        'Leon', 'Sylwester', 'Lucjan', 'Julian', 'Wiktor', 'Romuald', 'Bernard', 'Ludwik', 'Feliks', 'Alfred', 'Alojzy',
        'Przemysław', 'Cezary', 'Daniel', 'Mikołaj', 'Ignacy', 'Lesław', 'Radosław', 'Konrad', 'Bogumił',
        'Szczepan', 'Gerard', 'Hieronim', 'Krystian', 'Leonard', 'Wincenty', 'Benedykt', 'Hubert', 'Sebastian', 'Norbert',
        'Adolf', 'Łukasz', 'Emil', 'Teodor', 'Rudolf', 'Joachim', 'Jakub', 'Walenty', 'Alfons', 'Damian',
        'Rajmund', 'Szymon', 'Zygfryd', 'Leopold', 'Remigiusz', 'Florian', 'Konstanty', 'Augustyn', 'Albin', 'Bohdan', 'Dominik',
        'Gabriel', 'Teofil', 'Brunon', 'Juliusz', 'Walerian', 'Bartłomiej', 'Fryderyk', 'Eryk', 'Anatol',
        'Maksymilian', 'Gustaw', 'Aleksy', 'Longin', 'Bartosz', 'Wilhelm', 'Ferdynand', 'Erwin', 'Klemens', 'Lechosław',
        'Ernest', 'Seweryn', 'Herbert', 'Albert', 'Błażej', 'Izydor', 'Dionizy', 'Edwin', 'Ginter', 'Adrian',
        'Mateusz', 'Walter', 'Helmut', 'Bazyli', 'Marceli', 'Sergiusz', 'Bonifacy', 'Werner', 'Eligiusz', 'Wawrzyniec',
        'Kamil', 'Łucjan', 'Olgierd', 'Arnold', 'Jacenty', 'Dawid', 'Ewald', 'Manfred', 'Emilian', 'Klaudiusz',
        'Zbysław', 'Igor', 'Benon', 'Jędrzej', 'Wit', 'Hilary', 'Apolinary', 'Fabian', 'Zenobiusz', 'Horst', 'Gerhard',
        'Roland', 'Euzebiusz', 'Hipolit', 'Filip', 'Nikodem', 'Miron', 'January', 'Kajetan', 'Bazyl',
        'Emanuel', 'Idzi', 'Donat', 'August', 'Dymitr', 'Ksawery', 'Ludomir', 'Narcyz', 'Lubomir', 'Witalis', 'Roch',
        'Miłosz', 'Telesfor', 'Heronim', 'Ziemowit', 'Borys', 'Oskar', 'Zbyszko', 'Krystyn', 'Zbyszek',
        'Cyryl', 'Gracjan', 'Patryk', 'Reinhold', 'Eliasz', 'Ewaryst', 'Felicjan', 'Rufin', 'Bruno', 'Herman', 'Beniamin',
        'Kryspin', 'Rajnold', 'Apoloniusz', 'Engelbert', 'Cyprian', 'Walery', 'Medard', 'Gwidon', 'Celestyn',
        'Jaromir', 'Tytus', 'Wiaczesław', 'Kornel', 'Wieńczysław', 'Maurycy', 'Oswald', 'Jeremi', 'Kurt', 'Ingrid',
        'Klaus', 'Damazy', 'Eustachy', 'Otton', 'Korneliusz', 'Cezariusz', 'Tymoteusz', 'Justyn', 'Otto', 'Janisław'
    );
    private $femaleNames = array(
        'Maria', 'Krystyna', 'Anna', 'Barbara', 'Teresa', 'Elżbieta', 'Janina', 'Zofia', 'Jadwiga', 'Danuta', 'Halina',
        'Irena', 'Ewa', 'Małgorzata', 'Helena', 'Grażyna', 'Bożena', 'Stanisława', 'Jolanta', 'Marianna',
        'Urszula', 'Wanda', 'Alicja', 'Dorota', 'Agnieszka', 'Beata', 'Katarzyna', 'Joanna', 'Wiesława', 'Renata',
        'Iwona', 'Genowefa', 'Kazimiera', 'Stefania', 'Hanna', 'Lucyna', 'Józefa', 'Alina', 'Mirosława', 'Aleksandra',
        'Władysława', 'Henryka', 'Czesława', 'Lidia', 'Regina', 'Monika', 'Magdalena', 'Bogumiła', 'Marta', 'Marzena',
        'Leokadia', 'Mariola', 'Bronisława', 'Aniela', 'Bogusława', 'Eugenia', 'Izabela', 'Cecylia', 'Emilia', 'Łucja',
        'Gabriela', 'Sabina', 'Zdzisława', 'Agata', 'Edyta', 'Aneta', 'Daniela', 'Wioletta', 'Sylwia', 'Weronika',
        'Antonina', 'Justyna', 'Gertruda', 'Mieczysława', 'Franciszka', 'Rozalia', 'Zuzanna', 'Natalia', 'Celina', 'Ilona',
        'Alfreda', 'Wiktoria', 'Olga', 'Wacława', 'Róża', 'Karolina', 'Bernadeta', 'Julia', 'Michalina', 'Adela',
        'Ludwika', 'Honorata', 'Aldona', 'Eleonora', 'Violetta', 'Felicja', 'Walentyna', 'Pelagia', 'Apolonia', 'Brygida',
        'Zenona', 'Izabella', 'Romana', 'Zenobia', 'Waleria', 'Anita', 'Bożenna', 'Romualda', 'Marzanna', 'Anastazja',
        'Kamila', 'Aurelia', 'Ewelina', 'Ludmiła', 'Hildegarda', 'Teodozja', 'Feliksa', 'Nina', 'Paulina', 'Longina',
        'Julianna', 'Klara', 'Marlena', 'Teodora', 'Leonarda', 'Ryszarda', 'Liliana', 'Kinga', 'Lilianna', 'Albina',
        'Elwira', 'Gizela', 'Bolesława', 'Otylia', 'Karina', 'Arleta', 'Marzenna', 'Melania', 'Kornelia', 'Salomea',
        'Adelajda', 'Eryka', 'Dominika', 'Sławomira', 'Donata', 'Eliza', 'Tamara', 'Zyta', 'Bernadetta', 'Nadzieja',
        'Bernarda', 'Irmina', 'Julita', 'Wiera', 'Dagmara', 'Wioleta', 'Matylda', 'Edwarda', 'Lilla', 'Klaudia',
        'Żaneta', 'Tatiana', 'Elfryda', 'Patrycja', 'Anetta', 'Lilia', 'Teofila', 'Daria', 'Maryla', 'Rita', 'Amelia',
        'Eulalia', 'Lila', 'Lucja', 'Leontyna', 'Luba', 'Kunegunda', 'Ruta', 'Sonia', 'Seweryna',
        'Jarosława', 'Klementyna', 'Adriana', 'Edeltrauda', 'Filomena', 'Angelika', 'Tekla', 'Blandyna', 'Florentyna',
        'Luiza', 'Gerda', 'Krzysztofa', 'Adrianna', 'Martyna', 'Inga', 'Balbina', 'Erna', 'Domicela', 'Zinaida', 'Bogna',
        'Helga', 'Lubomira', 'Bernardyna', 'Maja', 'Kamilla', 'Benedykta', 'Ligia', 'Irmgarda', 'Leonia', 'Olimpia',
        'Bogdana', 'Amalia', 'Eufemia', 'Hanka', 'Mirella', 'Laura', 'Milena', 'Raisa', 'Ludomira', 'Petronela',
        'Wilhelmina', 'Konstancja', 'Mirela', 'Wincentyna', 'Marcela', 'Ingeborga', 'Benigna', 'Zenaida', 'Hieronima',
        'Dobrosława', 'Sylwestra', 'Augustyna', 'Erika', 'Prakseda', 'Lena', 'Irma', 'Berta', 'Scholastyka', 'Roma',
        'Marcelina'

    );

    private $maleSurnames = array(
        'Skoczek', 'Pikulski', 'Prusak', 'Pawlak', 'Czapski', 'Wojdyła', 'Żaczek', 'Janiak', 'Stróżyk', 'Brych', 'Maciejewski',
        'Kosakowski', 'Gromadzki', 'Zawiślak', 'Samsel', 'Filipek', 'Wojtczak', 'Malewski', 'Sakowski', 'Rudziński',
        'Kupczak', 'Waluś', 'Rogalski', 'Łątka', 'Kulik', 'Szarzyński', 'Marcinek', 'Rosiek', 'Zębala', 'Gawroński',
        'Dzioba', 'Babiak', 'Rożek', 'Polaczek', 'Bartosz', 'Kuźnik', 'Wołoszyn', 'Pieniążek', 'Zajkowski', 'Fabiański',
        'Zachara', 'Curyło', 'Garbowski', 'Kosiorowski', 'Szmyd', 'Poniatowski', 'Śmiechowski', 'Centkowski', 'Leśniewski',
        'Makuła', 'Podlaski', 'Mikulski', 'Furmanek', 'Cuper', 'Żakowski', 'Kłeczek', 'Pacan', 'Wałach', 'Szlęzak', 'Frontczak',
        'Matysik', 'Załoga', 'Szafraniec', 'Fijołek', 'Brzezicki', 'Tokarczyk', 'Staszkiewicz', 'Stryjewski', 'Sawczuk',
        'Muszyński', 'Romańczyk', 'Ponikowski', 'Szustak', 'Żmudziński', 'Siwicki', 'Dudzic', 'Frej', 'Jarczewski', 'Miazga', 'Bucholc',
        'Sulowski', 'Michalewicz', 'Radziejewski', 'Dubicki', 'Grochowski', 'Łyko', 'Gil', 'Walczyk', 'Antolak', 'Stopyra',
        'Orlik', 'Kudelski', 'Walkiewicz', 'Kielar', 'Klukowski', 'Kościelniak', 'Polok', 'Kostyra', 'Zembrzuski', 'Sujecki',
        'Raj', 'Hyla', 'Depta', 'Turczyński', 'Gronowski', 'Kubik', 'Czajkowski', 'Marczuk', 'Cywiński', 'Gałan', 'Dudka',
        'Gutowski', 'Zajączkowski', 'Machnicki', 'Skrzypiec', 'Owczarz', 'Manikowski', 'Piaskowski', 'Gondek', 'Walewski',
        'Witczak', 'Książek', 'Daszkiewicz', 'Magdziarz', 'Bodnar', 'Kałuża', 'Waga', 'Śliwa', 'Borowczyk', 'Styś', 'Zubek',
        'Piłat', 'Chrząstek', 'Gałczyński', 'Łuszczek', 'Stróżyński', 'Remiszewski', 'Kisielewicz', 'Wojciechowski', 'Abram',
        'Berger', 'Majcherczyk', 'Szafrański', 'Cioch', 'Kasztelan', 'Rusin', 'Piwowarski', 'Pankiewicz', 'Chodorowski',
        'Urbaś', 'Flis', 'Serwin', 'Piskorski', 'Górny', 'Jurczuk', 'Rządkowski', 'Konopacki', 'Iwańczyk', 'Masztalerz', 'Strzałkowski',
        'Grzywna', 'Piotrowski', 'Dudkowski', 'Dworzyński', 'Ciepły', 'Trzebiatowski', 'Brożek', 'Wolak', 'Olbryś',
        'Karolewski', 'Korus', 'Kramek', 'Kołtun', 'Iwaszkiewicz', 'Rusak', 'Pieprzyk', 'Pac', 'Samek', 'Kędra', 'Kwolek',
        'Słodkowski', 'Grzęda', 'Skrzyński', 'Tobiasz', 'Jachowicz', 'Olszowy', 'Fatyga', 'Przepiórka', 'Wysoczański',
        'Kucia', 'Bronowicki', 'Zaręba', 'Włodarski', 'Pniewski', 'Bagrowski', 'Kudzia', 'Góralski', 'Chromiński', 'Neumann', 'Korecki',
        'Szura', 'Wilga', 'Sołtysiak', 'Dybała', 'Kotlarski', 'Krzewiński', 'Juszkiewicz', 'Kłosowski', 'Mościcki',
        'Kuźmicz', 'Cedro', 'Osowski', 'Kuczma', 'Krzempek', 'Stodulski', 'Krzanowski', 'Jach', 'Rajski', 'Antosik', 'Bereza',
        'Kowolik', 'Jagieła', 'Jaroszek', 'Żygadło', 'Słota', 'Jeziorski', 'Kuźmiński', 'Bajerski', 'Cichowicz',
        'Perz', 'Dębek', 'Kubala', 'Chrobak', 'Dziki', 'Dziekan', 'Kotliński', 'Kantorski', 'Wadas', 'Czopek', 'Kociołek',

    );
    private $femaleSurnames = array(
        'Skoczek', 'Pikulska', 'Prusak', 'Pawlak', 'Czapska', 'Wojdyła', 'Żaczek', 'Janiak', 'Stróżyk', 'Brych', 'Maciejewska',
        'Kosakowska', 'Gromadzka', 'Zawiślak', 'Samsel', 'Filipek', 'Wojtczak', 'Malewska', 'Sakowska', 'Rudzińska',
        'Kupczak', 'Waluś', 'Rogalska', 'Łątka', 'Kulik', 'Szarzyńska', 'Marcinek', 'Rosiek', 'Zębala', 'Gawrońska', 'Dzioba',
        'Babiak', 'Rożek', 'Polaczek', 'Bartosz', 'Kuźnik', 'Wołoszyn', 'Pieniążek', 'Zajkowska', 'Fabiańska',
        'Zachara', 'Curyło', 'Garbowska', 'Kosiorowska', 'Szmyd', 'Poniatowska', 'Śmiechowska', 'Centkowska', 'Leśniewska',
        'Makuła', 'Podlaska', 'Mikulska', 'Furmanek', 'Cuper', 'Żakowska', 'Kłeczek', 'Pacan', 'Wałach', 'Szlęzak', 'Frontczak',
        'Matysik', 'Załoga', 'Szafraniec', 'Fijołek', 'Brzezicka', 'Tokarczyk', 'Staszkiewicz', 'Stryjewska', 'Sawczuk',
        'Muszyńska', 'Romańczyk', 'Ponikowska', 'Szustak', 'Żmudzińska', 'Siwicka', 'Dudzic', 'Frej', 'Jarczewska', 'Miazga', 'Bucholc',
        'Sulowska', 'Michalewicz', 'Radziejewska', 'Dubicka', 'Grochowska', 'Łyko', 'Gil', 'Walczyk', 'Antolak', 'Stopyra',
        'Orlik', 'Kudelska', 'Walkiewicz', 'Kielar', 'Klukowska', 'Kościelniak', 'Polok', 'Kostyra', 'Zembrzuska', 'Sujecka',
        'Raj', 'Hyla', 'Depta', 'Turczyńska', 'Gronowska', 'Kubik', 'Czajkowska', 'Marczuk', 'Cywińska', 'Gałan', 'Dudka',
        'Gutowska', 'Zajączkowska', 'Machnicka', 'Skrzypiec', 'Owczarz', 'Manikowska', 'Piaskowska', 'Gondek', 'Walewska',
        'Witczak', 'Książek', 'Daszkiewicz', 'Magdziarz', 'Bodnar', 'Kałuża', 'Waga', 'Śliwa', 'Borowczyk', 'Styś', 'Zubek',
        'Piłat', 'Chrząstek', 'Gałczyńska', 'Łuszczek', 'Stróżyńska', 'Remiszewska', 'Kisielewicz', 'Wojciechowska', 'Abram',
        'Berger', 'Majcherczyk', 'Szafrańska', 'Cioch', 'Kasztelan', 'Rusin', 'Piwowarska', 'Pankiewicz', 'Chodorowska',
        'Urbaś', 'Flis', 'Serwin', 'Piskorska', 'Górny', 'Jurczuk', 'Rządkowska', 'Konopacka', 'Iwańczyk', 'Masztalerz', 'Strzałkowska',
        'Grzywna', 'Piotrowska', 'Dudkowska', 'Dworzyńska', 'Ciepły', 'Trzebiatowska', 'Brożek', 'Wolak', 'Olbryś',
        'Karolewska', 'Korus', 'Kramek', 'Kołtun', 'Iwaszkiewicz', 'Rusak', 'Pieprzyk', 'Pac', 'Samek', 'Kędra', 'Kwolek',
        'Słodkowska', 'Grzęda', 'Skrzyńska', 'Tobiasz', 'Jachowicz', 'Olszowy', 'Fatyga', 'Przepiórka', 'Wysoczańska', 'Kucia',
        'Bronowicka', 'Zaręba', 'Włodarska', 'Pniewska', 'Bagrowska', 'Kudzia', 'Góralska', 'Chromińska', 'Neumann', 'Korecka',
        'Szura', 'Wilga', 'Sołtysiak', 'Dybała', 'Kotlarska', 'Krzewińska', 'Juszkiewicz', 'Kłosowska', 'Mościcka', 'Kuźmicz',
        'Cedro', 'Osowska', 'Kuczma', 'Krzempek', 'Stodulska', 'Krzanowska', 'Jach', 'Rajska', 'Antosik', 'Bereza',
        'Kowolik', 'Jagieła', 'Jaroszek', 'Żygadło', 'Słota', 'Jeziorska', 'Kuźmińska', 'Bajerska', 'Cichowicz', 'Perz',
        'Dębek', 'Kubala', 'Chrobak', 'Dzika', 'Dziekan', 'Kotlińska', 'Kantorska', 'Wadas', 'Czopek', 'Kociołek',
    );

    private $emailDomains = array(
        'gmail.com', 'yahoo.com', 'hotmail.com', 'wp.pl', 'poczta.onet.pl', 'o2.pl', 'interia.pl', 'op.pl', 'tlen.pl',
        'poczta.fm', 'gazeta.pl', 'go2.pl'
    );

    private $polishCharsSwap = array(
        'Ę' => 'E', 'Ó' => "O", 'Ą' => 'A', 'Ś' => 'S', 'Ł' => 'L', 'Ż' => 'Z', 'Ź' => 'Z', 'Ć' => 'C', 'Ń' => 'N',
        'ę' => 'e', 'ó' => 'o', 'ą' => 'a', 'ś' => 's', 'ł' => 'l', 'ż' => 'z', 'ź' => 'z', 'ć' => 'c', 'ń' => 'n'
    );

    private $seances;
    private $vouchers;
    private $rooms;
    private $movies;
    private $ticketPools;
    private $specialEvents;
    private $users;
    private $employees;
    private $payment;


    private function getPersonData()
    {
        $data = array(
            'female' => (boolean)rand(0, 1)
        );
        if($data['female']) {
            $data['name'] = $this->femaleNames[rand(0, count($this->femaleNames) - 1)];
            $data['surname'] = $this->femaleSurnames[rand(0, count($this->femaleSurnames) - 1)];
        } else {
            $data['name'] = $this->maleNames[rand(0, count($this->maleNames) - 1)];
            $data['surname'] = $this->maleSurnames[rand(0, count($this->maleSurnames) - 1)];
        }

        $data['email'] = strtolower(strtr($data['name'], $this->polishCharsSwap)) . "."
            . strtolower(strtr($data['surname'], $this->polishCharsSwap)) . '@'
            . $this->emailDomains[rand(0, count($this->emailDomains) - 1)];
        $data['phone'] = "" . rand(4, 9) . rand(0, 9) . rand(0, 9)
            . rand(0, 9) . rand(0, 9) . rand(0, 9)
            . rand(0, 9) . rand(0, 9) . rand(0, 9);
        $data['login'] = substr(strtolower(strtr($data['name'], $this->polishCharsSwap)), 0, 1)
            . strtolower(strtr($data['surname'], $this->polishCharsSwap))
            . rand(0, 9) . rand(0, 9) . rand(0, 9);

        return $data;
    }

//    /**
//     * @Route("/generator")
//     */
    public function generator()
    {
        set_time_limit(100000000);
        ini_set('memory_limit', '20000M');
        $startInsterts = new \DateTime();
        $begin = new \DateTime($this->startGeneration);
        $end = new \DateTime($this->endGeneration);

        $interval = \DateInterval::createFromDateString('1 day');
        $period = new \DatePeriod($begin, $interval, $end);

        $this->vouchers = array();
        $this->seances = array();
        $this->rooms = array();
        $this->movies = $movie = $this->getDoctrine()->getRepository(Filmy::class)->findAll();
        $this->ticketPools = $this->getDoctrine()->getRepository(Pulebiletow::class)->findAll();
        $this->specialEvents = $this->getDoctrine()->getRepository(Wydarzeniaspecjalne::class)->findAll();
        $this->rooms = $this->getDoctrine()->getRepository(Sale::class)->findAll();
        $this->users = $this->getDoctrine()->getRepository(Uzytkownicy::class)->findAll();
        $this->employees = $this->getDoctrine()->getRepository(Pracownicy::class)->findAll();
        $this->payment = $this->getDoctrine()->getRepository(Rodzajeplatnosci::class)->findAll();

        foreach($this->revLayout AS $key => $roomLayout) {
            foreach($roomLayout AS $key1 => $value) {
                $this->revLayout[$key][$key1] = $this->getDoctrine()->getRepository(Miejsca::class)->find($value);
            }
        }

        foreach($this->transLayout AS $key => $roomLayout) {
            foreach($roomLayout AS $key1 => $value) {
                $this->transLayout[$key][$key1] = $this->getDoctrine()->getRepository(Miejsca::class)->find($value);
            }
        }

        $counterS = 0;
        $counterV = 0;
        $counterR = 0;
        $counterT = 0;

        $counterS += $this->pushSeances($period);
        $counterV += $this->pushVouchers($counterS / 5 * $this->percentageOfNonEmptySeances, 0);
        $counterR += $this->pushReservations($this->percentageOfNonEmptySeances);
        $counterT += $this->pushTransaction($this->percentageOfNonEmptySeances);
        $this->updateTickets();
        $counterV += $this->pushVouchers(15, 1);

        return new Response('<html><body>Wygenerowano: <ul> '
            . '<li>' . $counterS . ' seansów</li>'
            . '<li>' . $counterV . ' voucherów</li>'
            . '<li>' . $counterR . ' rezerwacji</li>'
            . '<li>' . $counterT . ' tranasakcji</li>'
            . '</ul>'
            . 'W ' . date_diff($startInsterts, new \DateTime())->format('%H godz. %I min. %S s')
            . '</body></html>');
    }

    public function pushVouchers($numberOfPushes, $pushNumber)
    {
        set_time_limit(10000000);
        ini_set('memory_limit', '20000M');
        $counter = 0;
        $entityManager = $this->getDoctrine()->getManager();
        $promotionStart = \DateTime::createFromFormat('Y-m-d', $this->startGeneration);
        $promotionEnd = \DateTime::createFromFormat('Y-m-d', $this->endGeneration);
        for($i = 0; $i < $numberOfPushes; $i++) {
            $voucherCount = rand(1, 150);
            $generationDate = new \DateTime();
            $generationDate->setDate(2017, 10, 1);
            $generationDate->setTime(8, 34, 21);
            $generationDate->add(new \DateInterval('PT' . ($pushNumber * 10) . 'H' . ($i * 2 + 1) . 'M' . $i . 'S'));
            $money = (boolean)rand(0, 1);
            for($j = 0; $j < $voucherCount; $j++) {
                $voucher = new Vouchery();
                $voucher->setCzaswygenerowania($generationDate);
                $voucher->setCzykwotowa($money);
                $voucher->setPoczatekpromocji($promotionStart);
                $voucher->setKoniecpromocji($promotionEnd);
                $voucher->setCyfrakontrolna('0');
                if($money) {
                    $voucher->setWartosc(rand(20, 60) / 2);
                } else {
                    $voucher->setWartosc(rand(2, 20) * 5);
                }
                $voucher->setCzywykorzystany(false);
                $voucher->setLosowecyfry("" . rand(0, 9) . rand(0, 9) . rand(0, 9));
                $entityManager->persist($voucher);
                if($pushNumber == 0)
                    array_push($this->vouchers, $voucher);
                $counter++;
                if($counter % 5000 == 0)
                    $entityManager->flush();
            }
        }
        $entityManager->flush();
        $counter2 = 0;
        foreach($this->vouchers AS $voucher) {
            $voucher->recalculateControlDigit();
            $entityManager->merge($voucher);
            $counter2++;
            if($counter2 % 5000 == 0)
                $entityManager->flush();
        }
        $entityManager->flush();
        return $counter;
    }

    public function pushSeances(\DatePeriod $datePeriod)
    {
        set_time_limit(10000000);
        ini_set('memory_limit', '20000M');
        $counter = 0;
        $entityManager = $this->getDoctrine()->getManager();
        foreach($datePeriod as $date) {
            $timeArray = array([12, 16, 20], [14, 19, 22], [16, 21]);
            foreach($this->rooms AS $room) {
                $switch = rand(0, 2);
                $movie = $this->movies[rand(0, count($this->movies) - 3)];
                foreach($timeArray[$switch] AS $hour) {
                    $seanceStartDate = clone $date;
                    $seanceStartDate->setTime($hour, 0, 0, 0);
                    $ticketPool = $this->ticketPools[rand(0, count($this->ticketPools) - 1)];
                    $seanceType = $movie->getTypyseansow()->get($movie->getTypyseansow()->getKeys()[rand(0, count($movie->getTypyseansow()->getKeys()) - 1)]);

                    $seance = new Seanse();
                    $seance->setPoczatekseansu($seanceStartDate);
                    $seance->setSale($room);
                    $seance->setPulebiletow($ticketPool);
                    $seance->setTypyseansow($seanceType);
                    if($hour == 20) {
                        $seance->setWydarzeniaspecjalne($this->specialEvents[rand(0, count($this->specialEvents) - 1)]);
                    }

                    if(rand(1, 100) == 100) {
                        $seance->setCzyodwolany(true);
                    }

                    $entityManager->persist($seance);

                    if($hour == 20) {
                        $smf = new SeansMaFilmy();
                        $smf->setKolejnosc(1);
                        $smf->setSeanse($seance);
                        $smf->setFilmy($this->movies[rand(0, count($this->movies) - 3)]);

                        $entityManager->persist($smf);

                        $smf2 = new SeansMaFilmy();
                        $smf2->setKolejnosc(2);
                        $smf2->setSeanse($seance);
                        $smf2->setFilmy($this->movies[rand(0, count($this->movies) - 3)]);

                        $entityManager->persist($smf2);
                    } else {
                        $smf = new SeansMaFilmy();
                        $smf->setKolejnosc(1);
                        $smf->setSeanse($seance);
                        $smf->setFilmy($movie);

                        $entityManager->persist($smf);
                    }
                    $counter++;
                }
            }
        }
        $entityManager->flush();
        unset($this->movies);
        unset($this->ticketPools);
        gc_collect_cycles();
        $this->seances = $this->getDoctrine()->getRepository(Seanse::class)->findAll();

        return $counter;
    }

    public function pushReservations(float $maxPercentage)
    {
        set_time_limit(10000000);
        ini_set('memory_limit', '20000M');
        $entityManager = $this->getDoctrine()->getManager();
        $count = 0;

        $maxCount = count($this->seances) * $maxPercentage;
        if($maxCount > count($this->seances)) $maxCount = count($this->seances);
        else if($maxCount < 0.5 * count($this->seances)) $maxCount = 0.5 * count($this->seances);

        for($k = 0; $k < $maxCount; $k++) {
            $seance = $this->seances[$k];
            if($seance->getCzyodwolany()) continue;
            $seats = $this->revLayout[$seance->getSale()->getId()];
            $max = count($seats);
            $skipNumber = rand((int)$max * 0.2, (int)$max);
            $skipArray = array();
            for($i = 0; $i < $skipNumber; $i++) {
                $skipArray[$i] = rand(0, $max - 1);
            }
            $i = 0;
            while($i < $max) {
                $who = rand(1, 3);
                $booking = new Rezerwacje();

                $booking->setSfinalizowana(false);

                $places = rand(1, 8);
                if($places > $max - $i) $places = $max - $i;

                for($j = 0; $j < $places; $j++) {
                    if(in_array($i, $skipArray)) {
                        $i++;
                        continue;
                    }
                    if($i > $max) break;
                    $booking->getMiejsca()->add($seats[$i]);
                    $i++;
                }

                if(!$booking->getMiejsca()->count()) {
                    $i++;
                    continue;
                }

                $data = $this->getPersonData();
                switch($who) {
                    case 1: //pracownik
                        {
                            $employee = $this->employees[rand(0, count($this->employees) - 3)];

                            $booking->setSeanse($seance);
                            $booking->setCzyodwiedzajacy(false);
                            $booking->setImie($data['name']);
                            $booking->setNazwisko($data['surname']);
                            $booking->setEmail($data['email']);
                            $booking->setTelefon($data['phone']);
                            $booking->setPracownicy($employee);
                        };
                        break;
                    case 2: //odwiedzajacy
                        {
                            $booking->setSeanse($seance);
                            $booking->setCzyodwiedzajacy(true);
                            $booking->setImie($data['name']);
                            $booking->setNazwisko($data['surname']);
                            $booking->setEmail($data['email']);
                            $booking->setTelefon($data['phone']);
                        };
                        break;
                    case 3: //odwiedzajacy
                        {
                            $user = $this->users[rand(0, count($this->users) - 15)];

                            $booking->setSeanse($seance);
                            $booking->setCzyodwiedzajacy(false);
                            $booking->setImie($user->getImie());
                            $booking->setNazwisko($user->getNazwisko());
                            $booking->setEmail($user->getEmail());
                            $booking->setTelefon($user->getTelefon());
                            $booking->setUzytkownicy($user);
                        }
                }
                $entityManager->persist($booking);
                $count++;

                if($count % 5000 == 0)
                    $entityManager->flush();
            }
        }

        unset($this->maleNames);
        unset($this->femaleNames);
        unset($this->maleSurnames);
        unset($this->femaleSurnames);
        unset($this->emailDomains);
        unset($this->polishCharsSwap);
        gc_collect_cycles();

        $this->seances = $this->getDoctrine()->getRepository(Seanse::class)->findAll();

        return $count;
    }

    public function pushTransaction(float $maxPercentage)
    {
        set_time_limit(10000000);
        ini_set('memory_limit', '20000M');
        $entityManager = $this->getDoctrine()->getManager();
        $counter = 0;

        $vouchersCount = count($this->vouchers);
        $vouchersIndex = 0;

        $maxCount = count($this->seances) * $maxPercentage;
        if($maxCount > count($this->seances)) $maxCount = count($this->seances);
        else if($maxCount < 0.5 * count($this->seances)) $maxCount = 0.5 * count($this->seances);

        for($k = 0; $k < $maxCount; $k++) {
            $diff = 0;
            $seance = $this->seances[$k];
            unset($this->seances[$k]);
            if($seance->getCzyodwolany()) continue;

            $bookings = $seance->getRezerwacje()->getValues();
            unset($this->bookings[$seance->getId()]);

            $pool = $seance->getPulebiletow();

            $baseDate = clone $seance->getPoczatekseansu();
            $baseDate->setTime(0, 0, 0, 0);
            $promotions = $this->getDoctrine()->getRepository(Promocje::class)->findCurrent($baseDate);

            $entityManager = $this->getDoctrine()->getManager();

            $seatsT = $this->transLayout[$seance->getSale()->getId()];

            $matrix = array();
            foreach($seatsT AS $key => $value) {
                $matrix[$key] = array(0 => $value, 1 => NULL, 2 => false);
            }
            foreach($bookings AS $booking) {
                foreach($booking->getMiejsca()->getIterator() AS $place) {
                    $matrix[array_search($place, $seatsT)][1] = $booking;
                }
            }
            $max = count($seatsT);

            $skipNumber = rand((int)$max * 0.1, (int)$max * 0.9);
            $skipArray = array();
            for($i = 0; $i < $skipNumber; $i++) {
                $skipArray[$i] = $seatsT[rand(0, $max - 1)];
            }
            foreach($skipArray AS $skipId) {
                $matrix[array_search($skipId, $seatsT)][2] = true;
            }

            $i = 0;

            while($i < $max) {
                $transaction = new Tranzakcje();
                $date = clone $baseDate;
                $date->setTime(8, date("i"), date("s"), 0);
                $date->add(new \DateInterval("PT" . ($diff * 7 + 4) . "M" . ($diff * 5 + 3) . "S"));
                $transaction->setData($date);
                $transaction->setSeanse($seance);
                $tickets = new ArrayCollection();

                $promotion = NULL;

                if($matrix[$i][1]) {
                    $booking = $matrix[$i][1];
                    $booking->setSfinalizowana(true);
                    $entityManager->merge($booking);

                    if($promotions) {
                        if(rand(0, 1)) {
                            $promotion = $promotions[rand(0, count($promotions) - 1)];
                            $transaction->setPromocje($promotion);
                        }
                    }

                    $places = $booking->getMiejsca();

                    foreach($places AS $place) {
                        $matrix[array_search($place, $seatsT)][2] = true;
                        $ticket = new Bilety();

                        $ticket->setMiejsca($place);
                        $ticket->setLosowecyfry("" . rand(0, 9) . rand(0, 9) . rand(0, 9));
                        $ticket->setCzywykorzystany(false);
                        $ticket->setCzyanulowany(false);

                        $pmr = $pool->getPulaMaRodzajeBiletow()->get(
                            $pool->getPulaMaRodzajeBiletow()->getKeys()[rand(0, count($pool->getPulaMaRodzajeBiletow()->getKeys()) - 1)]
                        );

                        $ticket->setRodzajebiletow($pmr->getRodzajebiletow());

                        $basePrice = $pmr->getCena();
                        if($promotion) {
                            if($promotion->isCzykwotowa()) {
                                $basePrice = $basePrice - (float)$promotion->getWartosc();
                            } else {
                                $basePrice = $basePrice * (1 - (float)$promotion->getWartosc() / 100);
                            }
                        }
                        $useVoucher = rand(0, 1);
                        if($useVoucher and $vouchersIndex < $vouchersCount) {
                            $voucher = $this->vouchers[$vouchersIndex];
                            unset($this->vouchers[$vouchersIndex]);
                            $vouchersIndex++;
                            $voucher->setCzywykorzystany(true);
                            $entityManager->merge($voucher);
                            $ticket->setVouchery($voucher);
                            if($voucher->isCzykwotowa()) {
                                $basePrice = $basePrice - (float)$voucher->getWartosc();
                            } else {
                                $basePrice = $basePrice * (1 - (float)$voucher->getWartosc() / 100);
                            }
                        }
                        if($basePrice < 0) {
                            $basePrice = 0;
                        }

                        $ticket->setCena($basePrice);
                        $ticket->setCyfrakontrolna(0);
                        $tickets->add($ticket);
                    }

                    $transaction->setBilety($tickets);
                    $transaction->setCzyodwiedzajacy($booking->isCzyodwiedzajacy());
                    $transaction->setUzytkownicy($booking->getUzytkownicy());
                    if($booking->getPracownicy()) {
                        $transaction->setPracownicy($this->getDoctrine()->getRepository(Pracownicy::class)->find(rand(1, 45)));
                        $transaction->setRodzajeplatnosci($this->getDoctrine()->getRepository(Rodzajeplatnosci::class)->find(rand(1, 2)));
                    } else {
                        $rand = rand(1, 2);
                        if($rand == 2) $rand++;
                        $transaction->setRodzajeplatnosci($this->getDoctrine()->getRepository(Rodzajeplatnosci::class)->find($rand));
                    }

                    while($i < $max and $matrix[$i][2]) {
                        $i++;
                    }

                } else {
                    $who = rand(1, 3);
                    $placesMaxCount = rand(1, 8);
                    if($placesMaxCount > $max - $i) $placesMaxCount = $max - $i;

                    if($promotions) {
                        if(rand(0, 1)) {
                            $promotion = $promotions[rand(0, count($promotions) - 1)];
                            $transaction->setPromocje($promotion);
                        }
                    }

                    switch($who) {
                        case 1:
                            {
                                $transaction->setCzyodwiedzajacy(false);
                                $transaction->setPracownicy($this->employees[rand(0, count($this->employees) - 3)]);
                                $transaction->setRodzajeplatnosci($this->payment[rand(0, 1)]);
                            };
                            break;
                        case 2:
                            {
                                $transaction->setCzyodwiedzajacy(true);
                                $transaction->setRodzajeplatnosci($this->payment[2]);
                            };
                            break;
                        case 3:
                            {
                                $transaction->setCzyodwiedzajacy(false);
                                $transaction->setUzytkownicy($this->users[rand(0, count($this->users) - 15)]);
                                $transaction->setRodzajeplatnosci($this->payment[2]);
                            }

                    }
                    for($j = 0; $j < $placesMaxCount and !$matrix[$i][2] and !$matrix[$i][1]; $j++) {
                        $ticket = new Bilety();

                        $ticket->setMiejsca($matrix[$i][0]);
                        $ticket->setLosowecyfry("" . rand(0, 9) . rand(0, 9) . rand(0, 9));
                        $ticket->setCzywykorzystany(false);
                        $ticket->setCzyanulowany(false);

                        $pmr = $pool->getPulaMaRodzajeBiletow()->get(
                            $pool->getPulaMaRodzajeBiletow()->getKeys()[rand(0, count($pool->getPulaMaRodzajeBiletow()->getKeys()) - 1)]
                        );

                        $ticket->setRodzajebiletow($pmr->getRodzajebiletow());

                        $basePrice = $pmr->getCena();
                        if($promotion) {
                            if($promotion->isCzykwotowa()) {
                                $basePrice = $basePrice - (float)$promotion->getWartosc();
                            } else {
                                $basePrice = $basePrice * (1 - (float)$promotion->getWartosc() / 100);
                            }
                        }
                        $useVoucher = rand(0, 1);
                        if($useVoucher and $vouchersIndex < $vouchersCount) {
                            $voucher = $this->vouchers[$vouchersIndex];
                            unset($this->vouchers[$vouchersIndex]);
                            $vouchersIndex++;
                            $voucher->setCzywykorzystany(true);
                            $entityManager->merge($voucher);
                            $ticket->setVouchery($voucher);
                            if($voucher->isCzykwotowa()) {
                                $basePrice = $basePrice - (float)$voucher->getWartosc();
                            } else {
                                $basePrice = $basePrice * (1 - (float)$voucher->getWartosc() / 100);
                            }
                        }
                        if($basePrice < 0) {
                            $basePrice = 0;
                        }

                        $ticket->setCena($basePrice);
                        $ticket->setCyfrakontrolna(0);
                        $tickets->add($ticket);

                        $i++;
                    }

                    while($i < $max and $matrix[$i][2]) {
                        $i++;
                    }

                    if($tickets->count()) {
                        foreach($tickets->getIterator() AS $ticket) {
                            $ticket->setTranzakcje($transaction);
                            $ticket->setCyfrakontrolna(0);
                        }

                        $transaction->setBilety($tickets);
                        if($transaction->getSum() == 0.00) {
                            $transaction->setRodzajeplatnosci($this->payment[1]);
                        }
                        $entityManager->persist($transaction);

                        $counter++;
                    }
                    if($counter % 5000 == 0) {
                        $entityManager->flush();
                        gc_collect_cycles();
                    }
                    $diff++;
                }
            }
        }

        $entityManager->flush();

        unset($this->seances);
        unset($this->users);
        unset($this->employees);
        unset($this->rooms);
        unset($this->specialEvents);
        unset($this->transLayout);
        unset($this->revLayout);
        gc_collect_cycles();

        return $counter;
    }

    public function updateTickets()
    {

        set_time_limit(10000000);
        ini_set('memory_limit', '20000M');

        $entityManager = $this->getDoctrine()->getManager();

        $counter = 0;
        while($transactions = $this->getDoctrine()->getRepository(Tranzakcje::class)->findBy(array(), NULL, 5000, $counter)) {
            foreach($transactions AS $transaction) {
                foreach($transaction->getBilety()->getIterator() AS $ticket) {
                    $ticket->recalculateControlDigit();
                }
                $entityManager->merge($transaction);
                $counter++;
            }
            $entityManager->flush();
        }
    }
}