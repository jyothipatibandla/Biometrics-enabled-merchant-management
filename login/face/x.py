n = int(input())
flag = 0
f1 = 0
f2 = 0
res = 0
for i in range(n):
    TotalSplits = input()
    TotalSplits = int(TotalSplits)

    cor = [int(i) for i in input().split()][:2]

    seperation = [int(i) for i in input().split()][:TotalSplits]
    seperation.sort(reverse=False)
    cor.sort(reverse=False)

    while f2 < TotalSplits and f1 < 2:
        if cor[f1] < seperation[f2]:
            flag = flag + 1
            f1 = f1 + 1
        else:
            flag = flag - 1
            f2 = f2 + 1
        if res < flag:
            res = flag
    if not res:
        print('Yes')
    else:
        print('No')




