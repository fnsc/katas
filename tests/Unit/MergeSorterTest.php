<?php

namespace Katas;

use PHPUnit\Framework\TestCase;

class MergeSorterTest extends TestCase
{
    public function testShouldOrderGivenArray(): void
    {
        // Set
        $expected = $data = [8416, 3115, 8213, 6762, 4393, 9070, 3008, 5882, 549, 1931, 8134, 3397, 2892, 517, 7933, 6614, 368, 2998, 8927, 8234, 8875, 3204, 7518, 2288, 5702, 8900, 6063, 5862, 1670, 7093, 8049, 7427, 7228, 7213, 9656, 8768, 3780, 9194, 7993, 6790, 8671, 3725, 8053, 7426, 4619, 3400, 9890, 8661, 2827, 4520, 6180, 2699, 7600, 3639, 7838, 223, 7841, 530, 8529, 2297, 9075, 2768, 7518, 8192, 8824, 5980, 8446, 7561, 65, 932, 3737, 5547, 877, 897, 9271, 6222, 5622, 7750, 1862, 9749, 5379, 4435, 1961, 916, 7098, 5265, 2856, 121, 56, 8686, 7686, 4066, 9937, 6279, 6876, 9305, 6154, 2548, 5595, 8373, 4250, 8196, 7622, 27, 9754, 2039, 6460, 9673, 2230, 626, 8819, 464, 205, 9765, 5763, 881, 55, 6424, 6541, 1803, 3531, 1735, 8307, 6645, 5746, 4707, 749, 3210, 3895, 7367, 2915, 6281, 2781, 1745, 7839, 5079, 7717, 5957, 971, 7614, 8751, 3589, 4123, 653, 2221, 7431, 9363, 6437, 7272, 2137, 9044, 1203, 9988, 592, 393, 5050, 960, 9286, 1264, 7358, 1686, 472, 9638, 1223, 8234, 9029, 2235, 952, 7402, 9127, 8161, 6361, 4418, 3575, 5951, 5840, 175, 2910, 758, 5250, 834, 3924, 2380, 3292, 9882, 5312, 3598, 9767, 5152, 7448, 127, 7717, 7813, 2908, 924, 2796, 5766, 8110, 9230, 2020, 2378, 3197, 1209, 3034, 9914, 4017, 2111, 9086, 7692, 9706, 398, 5621, 6075, 9564, 685, 5041, 6275, 2750, 6625, 5404, 8802, 9365, 2919, 5297, 7875, 1627, 4152, 1485, 363, 3982, 7665, 2020, 4671, 1823, 954, 2845, 8092, 7409, 3064, 1560, 1830, 7577, 129, 9280, 3732, 1618, 9086, 4598, 5908, 4209, 7596, 4140, 3799, 8959, 6817, 2913, 1698, 1849, 2152, 8468, 1224, 6239, 7972, 817, 6365, 8398, 9579, 8243, 5762, 2330, 7700, 5823, 5036, 372, 1876, 8114, 5118, 6985, 5437, 9700, 8956, 6434, 425, 9877, 3749, 1268, 1879, 3095, 4442, 4627, 7442, 347, 2820, 3997, 8707, 1929, 1601, 8900, 9672, 7014, 4714, 2519, 4059, 2414, 6617, 4932, 7434, 1936, 2033, 6012, 1615, 9839, 7127, 7699, 2404, 2460, 2176, 4074, 8410, 7685, 564, 5831, 128, 3205, 4467, 9414, 7422, 4530, 9294, 6912, 4007, 9662, 6808, 1992, 4650, 3418, 6797, 6150, 7769, 902, 5701, 6917, 111, 6962, 4929, 8358, 6762, 3010, 3963, 7863, 8211, 541, 7221, 1962, 5136, 6160, 4060, 8024, 2755, 4879, 3768, 9912, 6713, 3793, 6235, 5428, 7632, 6005, 9069, 9062, 2603, 5825, 8214, 8502, 2712, 9277, 7908, 2991, 7706, 3987, 4794, 5470, 6201, 6839, 155, 3062, 3823, 5513, 2100, 3176, 3743, 6953, 677, 5822, 8358, 4373, 5724, 7406, 6924, 6203, 3370, 4154, 7349, 7700, 9461, 7937, 9268, 7000, 4902, 4918, 3874, 3849, 165, 5316, 879, 5106, 9292, 3272, 6542, 2439, 4371, 4441, 4694, 6598, 2924, 1122, 1655, 435, 2045, 6554, 9656, 2557, 4645, 522, 3043, 9502, 3716, 3131, 6954, 854, 1587, 8139, 2239, 247, 12, 1898, 4047, 1035, 2224, 4647, 9938, 9648, 7287, 9701, 7631, 9703, 4680, 697, 453, 544, 4684, 4544, 190, 538, 675, 343, 4993, 6209, 4772, 2383, 8411, 6999, 1077, 4789, 3284, 3330, 151, 5282, 4794, 9831, 2943, 2178, 320, 2656, 2332, 1675, 6644, 2637, 6953, 2079, 67, 6397, 1375, 8382, 7632, 4134, 4362, 3694, 3933, 4965, 1550, 7258, 801, 6648, 3903, 5771, 98, 7316, 4385, 3246, 633, 1249, 1799, 2266, 975, 8751, 8618, 7129, 3836, 8817, 9484, 8199, 1240, 8501, 8687, 833, 9214, 8105, 380, 6040, 4752, 1909, 905, 7786, 2548, 7183, 8502, 3725, 8996, 5091, 7405, 3462, 6712, 6758, 7835, 5672, 6765, 3613, 3540, 2792, 3613, 7765, 1771, 9718, 1336, 1920, 4702, 306, 2469, 3043, 5057, 9812, 571, 9148, 6827, 5750, 5344, 849, 6690, 1513, 123, 8760, 2380, 7506, 2419, 4440, 5813, 7369, 1868, 2708, 8801, 3378, 6379, 1967, 688, 8708, 8177, 897, 9024, 5915, 1452, 7353, 515, 1534, 6334, 9187, 5046, 2667, 7230, 1901, 2003, 4091, 6075, 85, 6722, 5848, 5816, 2552, 8419, 5619, 2353, 9789, 577, 4781, 6222, 7968, 7842, 9440, 9470, 1800, 3694, 4272, 9916, 6658, 917, 9866, 1157, 8905, 2108, 2519, 6636, 2818, 8427, 663, 109, 3537, 4218, 9201, 289, 3668, 1303, 5875, 6202, 2629, 8617, 1083, 278, 8832, 701, 2089, 4704, 1209, 962, 1851, 1767, 5051, 392, 5214, 1692, 5268, 4667, 7795, 7111, 470, 5514, 376, 2063, 1995, 2124, 8687, 3906, 2574, 4981, 3403, 3686, 820, 1019, 6771, 1049, 6559, 8473, 6035, 7839, 2578, 250, 8702, 9493, 5182, 1601, 7523, 779, 4930, 8089, 4, 9450, 1763, 7309, 2296, 9254, 1891, 162, 4156, 3182, 9602, 2511, 7737, 5504, 7346, 8256, 6990, 5968, 6417, 5569, 4, 9929, 7104, 5884, 563, 1774, 2360, 6851, 8876, 8028, 422, 5997, 8494, 477, 4410, 5294, 5770, 2374, 9678, 4457, 5667, 8246, 8068, 1788, 2129, 2101, 6477, 5230, 9927, 4752, 5708, 1909, 613, 8354, 6301, 8857, 4564, 1935, 7778, 6410, 5766, 6287, 6844, 3506, 3634, 3262, 1752, 3380, 8483, 5556, 7833, 7963, 5915, 6463, 4529, 6275, 199, 5410, 2248, 7702, 675, 1136, 8645, 9969, 2274, 6078, 6658, 2019, 2136, 2140, 1039, 8148, 4997, 4696, 1163, 9622, 6764, 6120, 1609, 6796, 3038, 9668, 6531, 5921, 295, 9901, 8240, 1607, 6557, 8334, 309, 1056, 5382, 8969, 8218, 4616, 6599, 6356, 3429, 1771, 3233, 8924, 6436, 4057, 8984, 7059, 1260, 2503, 7059, 9531, 194, 38, 1380, 2310, 642, 2041, 9019, 9477, 4769, 9611, 8773, 6164, 2158, 7297, 8964, 2890, 6138, 8804, 2090, 1089, 6901, 84, 5208, 2045, 8127, 5429, 1880, 6719, 9668, 3705, 3721, 4381, 2509, 4259, 8489, 2242, 1497, 9221, 2931, 4503, 5160, 311, 2046, 6935, 7168, 5086, 5704, 9263, 5372, 2843, 5143, 9597, 19, 3856, 7043, 9152, 5631, 4890, 9231, 9829, 8516, 6985, 9381, 4463, 5572, 4701, 4319, 9869, 9566, 525, 2536, 2182, 2809, 4196, 925, 4379, 8106, 7033, 4949, 693, 2928, 1107, 1592, 8379, 8057, 1812, 2411, 135, 4077, 4649, 9946, 4917, 469, 9797, 2853, 5410, 1784, 2181, 2733, 2895, 6149, 7692, 1163, 9886, 4683, 56, 9653, 3162, 6429, 3265, 6936, 3086, 1362, 8908, 9827, 4894, 2633, 8514, 4443, 7463, 9012, 6433, 749, 7842, 6298, 4903, 2813, 213, 5231, 1966, 3701, 4771, 2126, 4727, 3081, 4352, 3242, 327, 4588, 9768, 5491, 5677, 9841, 9182, 4162, 3487, 3012, 872, 5330, 3646, 4995, 4367, 9788, 3855, 4100, 917, 4119, 5794, 3963, 4509, 3901, 5045, 3735, 4784, 5036, 8163, 5365, 7668, 9954, 4776, 5797, 2697, 4375, 5896, 6823, 9571, 4172, 3848];
        sort($expected);

        $sorter = new MergeSorter();

        // Actions
        $result = $sorter->sort($data);

        // Assertions
        $this->assertSame($expected, $result);
    }
}
